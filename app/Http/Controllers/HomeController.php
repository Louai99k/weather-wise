<?php

namespace App\Http\Controllers;

class HomeController
{
    public function index()
    {
        $date = date("H:m | F d, o");

        return view("index", ["date" => $date]);
    }
}
