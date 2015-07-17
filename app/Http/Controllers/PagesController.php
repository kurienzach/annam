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

    public function menu()
    {
        $dishes_db = Dish::all();
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

        return view('user.menu', ["dishes" => $dishes]);
    }
}
