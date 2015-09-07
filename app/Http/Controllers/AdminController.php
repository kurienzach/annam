<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Validator;

use App\Dish;
use App\DishCategory;


class AdminController extends Controller {

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
}
