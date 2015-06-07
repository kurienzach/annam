<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	/**
     * Main Page View
     */

    public function index()
    {
        return view('user.index');
    }

}
