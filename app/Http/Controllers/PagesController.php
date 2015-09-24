<?php namespace App\Http\Controllers;

use Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Order;
use App\OrderDish;
use App\Location;
use App\Dish;

use Carbon\Carbon;

use Illuminate\Http\Request;

class PagesController extends Controller {
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
        return view('user.cart', ["cart" => json_encode($request->session()->get('cart', array()))]);
    }

    public function updatecart(Request $request) {
        $request->session()->put('cart', json_decode($request->get('cart')));
        return json_encode($request->get('cart'));
    }

    public function updatelocation(Request $request) {
        $request->session()->put('location', $request->get('location'));
        return ($request->get('location'));
    }

    public function placeorder(Request $request) {
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
                $order->mobile_no = $user->mobile;
                $order->delivery_address = $request->session()->get('location');
                $order->save();

                $noItems = 0;
                $totalPrice = 30.0;

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
                $order->total_price = $totalPrice;
                $order->save();
            }
        }

        $request->session()->forget('cart');

        return view('user.order');
    }
}
