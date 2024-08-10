<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\publication;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //return view('home');
        //fetch publications (ref-> authour conrtoller-> index)
        //$authors = User::where('role', User::USER_ROLE_AUTHOR)->get();
        //return view('authors/index', ['authors' => $authors]);

      $publications = publication::where('pub_name')->get();


        $publications = Publication::all();
        return view('home', ['publications' => $publications]);
    }
}
