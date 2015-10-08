<?php namespace App\Http\Controllers;

use App;
use Auth;
use View;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDish;
use App\Location;
use App\Dish;
use App\Rate;

use Validator;
use Hash;

use Carbon\Carbon;

use Illuminate\Http\Request;

class PagesController extends Controller {
    // Static page controller function
    public function pages($id)
    {
        if (View::exists('user.static.' . $id))
            return view('user.static.' . $id);
        else
            App::abort(404);
    }
    public function login(Request $request)
    {
        return view('user.login', [
            "cart" => json_encode($request->session()->get('cart', array()))
        ]);
    }

    public function authuser(Request $request) 
    {
        if (Auth::attempt([
            'email' => $request->get('email'),
            'password' => $request->get('password')
        ])) {
            return redirect()->intended('/'); 
        }
        return redirect()->back()->withInput()->withErrors(['msg' => 'Invalid Usersname / Password']);
    }

	/**
     * Main Page View
     */

    public function index(Request $request)
    {
        $locations = Location::all();
        return view('user.index', [
            "cart" => json_encode($request->session()->get('cart', array())),
            "locations" => $locations
        ]);
    }

    public function postMenu(Request $request)
    {
        $request->session()->put('location', $request->get('location'));
        return redirect('menu');
    }

    public function menu(Request $request)
    {
        // Location has to be set before the user can view the menu
        if (!$request->session()->has('location')) {
            return redirect('/'); 
        }

        $dishes_db = Dish::where('enabled', True)->get();

        // Find dishes available only for the specific day

        // Curently the logic for dishes occuring on specific dates is
        // not implemented. The only option is to enable disable a dish
        $dishes = collect();

        foreach ($dishes_db as $dish) 
        {
            $dish_item = collect();
            $dish_item->put('id', $dish->id);
            $dish_item->put('name', $dish->name);
            $dish_item->put('description', $dish->description);
            $dish_item->put('price', $dish->price);
            $dish_item->put('img_url', $dish->img_url);

            $categories = array();
            foreach($dish->categories()->get() as $category)
            {
                array_push($categories, $category->name);
            }
            $dish_item->put('categories', $categories);

            $dishes->push($dish_item);
        }

        $locations = Location::all();

        return view('user.menu', [
            "dishes" => $dishes, 
            "cart" => json_encode($request->session()->get('cart', array())),
            "location" => $request->session()->get('location'),
            "locations" => $locations->toJSON()
        ]);
    }

    public function cart(Request $request) {
        $rates = Rate::find(1);
        return view('user.cart', [
            "cart" => json_encode($request->session()->get('cart', array())),
            "rates" => $rates
        ]);
    }

    public function updatecart(Request $request) {
        $request->session()->put('cart', json_decode($request->get('cart')));
        return json_encode($request->get('cart'));
    }

    public function updatelocation(Request $request) {
        $request->session()->put('location', $request->get('location'));
        return ($request->get('location'));
    }

    public function checkout(Request $request)
    {
        $user = Auth::user();
        $cart = json_encode($request->session()->get('cart', array()));
        $rates = Rate::find(1);

        $phpcart = $request->session()->get('cart', array());

        if (count($phpcart) == 0) { 
            return redirect('/menu');
        }

        return view('user.checkout', compact('user', 'cart', 'phpcart', 'rates'));
    }

    public function placeorder(Request $request) {
        //Validations
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|numeric',
            'address' => 'required|max:200',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'country' => 'required|max:50',
            'pincode' => 'required|max:50',
            'cart' => 'required'
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }
        // Add logic to place order here
        $user = Auth::getUser();
        $cart = json_decode($request->get('cart'));

        if ($request->get('cart') == "{}")
            return 'Error';

        // The cart variable obained is already grouped on
        // date and category add the orders to the tables
        foreach($cart as $date => $cartdate) {
            foreach($cartdate as $category => $cartdatecat) {
                $order = new Order();
                $order->order_date = Carbon::createFromFormat('d/m/y', $date);
                $order->category = $category;
                $order->user_id = $user->id;
                $order->user_name = $request->get('name');
                $order->mobile_no = $request->get('mobile');
                $order->delivery_address = $request->get('address');
                $order->delivery_city = $request->get('city');
                $order->delivery_state = $request->get('state');
                $order->delivery_country = $request->get('country');
                $order->delivery_pincode = $request->get('pincode');
                $order->save();

                $noItems = 0;
                $totalPrice = 0.0;

                foreach($cartdatecat as $item) {
                    $dish = Dish::find($item->id);

                    $orderdish = new OrderDish();   
                    $orderdish->order_id = $order->id;
                    $orderdish->dish_id = $item->id;
                    $orderdish->dish_name = $dish->name;
                    $orderdish->dish_price = $dish->price;
                    $orderdish->dish_qty = $item->qty;
                    $orderdish->save();

                    $noItems += 1;
                    $totalPrice += $orderdish->dish_price * $orderdish->dish_qty;
                }

                $order->no_items = $noItems;
                // [TODO]: Any tax calculations etc. needs to be done here. Need to clarify with the customer before implementation
                $order->total_price = $totalPrice;
                $order->save();
            }
        }

        $request->session()->forget('cart');

        return view('user.order');
    }

    public function profile(Request $request)
    {
        $user = Auth::user();
        $cart = json_encode($request->session()->get('cart', array()));
        return view('user.profile', compact('user', 'cart'));
    }

    public function save_profile(Request $request)
    {
        $user = Auth::user();

        //Validations
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required||numeric',
            'address' => 'required|max:200',
            'city' => 'required|max:50',
            'state' => 'required|max:50',
            'country' => 'required|max:50',
            'pincode' => 'required|max:50'
        ]);

        $request->session()->flash('msg_source', 'profile');

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }


        $user->update($request->all());
        return redirect('/profile')->with('profile_updated', 'true');
    }

    public function change_password(Request $request)
    {
        $user = Auth::user();
        $request->session()->flash('msg_source', 'password');

        // Check if old password is correct
        if (!Hash::check($request->get('old_password'), $user->password)) {
            return back()->withErrors(['The current password you entered is wrong']);
        }

        // Validations
		$validator =  Validator::make($request->all(), [
			'password' => 'required|confirmed|min:6',
		]);

        if ($validator->fails()) {
            return back()->withErrors($validator);
        }

        // Update the password
        $user->password = Hash::make($request->get('password'));
        $user->save();

        return redirect('/profile')->with('password_updated', 'true');
    }
}
