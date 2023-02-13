<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Client;
use App\Models\Location;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('home');
    }

    public function vue()
    {
        return view('livewire.vue_articles.vue')
            ->with('user_count', User::all()->count())
            ->with('article_count', Article::all()->count())
            ->with('post_location', Location::all()->count())
            ->with('post_clients', Client::all()->count());
    }
}
