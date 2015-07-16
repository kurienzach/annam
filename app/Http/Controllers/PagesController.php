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
        $dishes = Dish::all();
        return view('user.menu', ["dishes" => $dishes]);
    }
}
