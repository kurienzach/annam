<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;

use App\Dish;
use App\DishCategory;
use App\Order;
use App\User;
use App\OrderDish;
use App\Location;

use Carbon\Carbon;

class AdminController extends Controller {
    /*
    |--------------------------------------------------------------------------
    | Dishes controllers
    |--------------------------------------------------------------------------
    */

    public function dishes() {
        $dishes = Dish::all(); 

        return view('admin.dishes', [
            'dishes' => $dishes 
        ]);
    }

    public function addDish()
    {
        return view('admin.dish');
    }

    public function editDish($id)
    {
        $dish = Dish::findOrFail($id);
        return view('admin.dish', [
            'dish' => $dish 
        ]);
    }

    public function store(Request $request)
    {
        // Check if request is for create dish or delete dish
        if (empty($request->get('id'))) {
            $validation = Validator::make(
                $request->all(),
                array(
                    'name' => 'required|max:100',
                    'description' => 'required|max:250',
                    'price' => 'required|numeric',
                    'dish_img' => 'required|image'
                )
            );
            $dish = new Dish();
        }
        else {
            $validation = Validator::make(
                $request->all(),
                array(
                    'name' => 'required|max:100',
                    'description' => 'required|max:250',
                    'price' => 'required|numeric',
                    'dish_img' => 'image'
                )
            );
            $dish = Dish::findOrFail($request->get('id'));
        }

        if ($validation->fails()) {
            $messages = $validation->messages();
            return redirect()->back()->withErrors($messages)->withInput();
        }

        // ********** Validation done process

        // Check if the request is for deletion
        if ($request->has('delete')) {
            $dish->delete();
            return redirect(url('admin/dishes'));
        }

        // Request is for update operation
        $dish->name = $request->get('name');
        $dish->description = $request->get('description');

        $categories = [];
        if ($request->has('breakfast'))
            array_push($categories, 1);
        if ($request->has('lunch'))
            array_push($categories, 2);
        if ($request->has('dinner'))
            array_push($categories, 3);

        $dish->price = $request->get('price');
        if ($request->has('enabled'))
            $dish->enabled = True;
        else
            $dish->enabled = False;;

        if ($request->hasFile('dish_img')) {
            $file = $request->file('dish_img');
            // [TODO]: Need to delete the old file before moving the new one
            $file->move(public_path().'/images/dishes', $file->getClientOriginalName());
            $dish->img_url = $file->getClientOriginalName(); 
        }

        $dish->save();
        $dish->categories()->sync($categories);

        return redirect(url('admin/dishes'));
    }

    /*
    |--------------------------------------------------------------------------
    | Orders controllers
    |--------------------------------------------------------------------------
    */

    public function ordersToday()
    {
        $overdue = Order::where('delivered', false)->where('order_date', '<', Carbon::now()->toDateString())->get();
        $today = Order::where('delivered', false)->where('order_date', '=', Carbon::now()->toDateString())->get();
        $tomorrow = Order::where('delivered', false)->where('order_date', '=', Carbon::now()->addDay()->toDateString())->get();
        return view('admin.orders_today', [
            'overdue_orders' => $overdue,
            'tomorrow_orders' => $tomorrow,
            'today_orders' => $today 
        ]);
    }

    public function ordersAll()
    {
        $orders = Order::where('delivered', false)->get();
        return view('admin.orders_all', [
            'orders' => $orders 
        ]);
    }

    public function ordersDelivered()
    {
        $orders = Order::where('delivered', true)->get();
        return view('admin.orders_delivered', [
            'orders' => $orders 
        ]);
    }

    public function showOrder($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.order', [
            'order' => $order 
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | Locations controllers
    |--------------------------------------------------------------------------
    */
    public function locations()
    {
        $locations = Location::all();
        return view('admin.locations', [
            'locations' => $locations 
        ]);
    }

    public function editLocation($id)
    {
        $location = Location::findOrFail($id);
        return view('admin.location', [
            'location' => $location 
        ]);
    }

    public function storeLocation(Request $request)
    {
        // Validations
        $validation = Validator::make(
            $request->all(),
            array(
                'name' => 'required|max:100',
                'city' => 'required|max:100',
                'state' => 'required|max:100'
            )
        );

        if ($validation->fails()) {
            $messages = $validation->messages();
            return redirect()->back()->withErrors($messages)->withInput();
        }

        // Check if request is for create or edit 
        if (empty($request->get('id'))) {
            $location = new Location();
        }
        else {
            $location = Location::findOrFail($request->get('id'));
        }

        // Check if the request is for deletion
        if ($request->has('delete')) {
            $location->delete();
            return redirect(url('admin/locations'));
        }

        // Request is for update operation
        $location->name = $request->get('name');
        $location->city = $request->get('city');
        $location->state = $request->get('state');

        $location->save();

        return redirect(url('admin/locations'));
    }

    public function addLocation()
    {
        return view('admin.location');
    }
}
