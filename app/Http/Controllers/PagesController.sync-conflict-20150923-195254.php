<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Dish;

use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
     * Main Page View
     */

    public function index()
    {
        return view('user.index');
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

        $dishes_db = Dish::all();

        // Find dishes available only for the specific day

        $dishes = collect();

        foreach ($dishes_db as $dish) 
        {
            $dish_item = collect();
            $dish_item->put('id', $dish->id);
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

        return view('user.menu', [
            "dishes" => $dishes, 
            "cart" => json_encode($request->session()->get('cart', array())),
            "location" => $request->session()->get('location')
        ]);
    }

    public function cart(Request $request) {
        return view('user.cart', ["cart" => json_encode($request->session()->get('cart', array()))]);
    }

    public function updatecart(Request $request) {
        $request->session()->put('cart', json_decode($request->get('cart')));
        return json_encode($request->get('cart'));
    }

}
