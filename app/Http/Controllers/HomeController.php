<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('dashboard');
    }

    public function show()
    {
        $cards = [];

        for ($i=0; $i < 10 ; $i++) {
            $cards[] = new Card();
        }

        return view("home", compact('cards'));
    }
}
    class Card
    {
        public $image = "https://user-images.githubusercontent.com/49427056/77442818-02a2dc00-6e2e-11ea-9406-4d805b6647cb.png";
        public $title = "タイトル";
        public $content = "ここに文字列が入ります";
    }
