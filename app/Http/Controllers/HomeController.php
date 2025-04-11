<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home()
    {
        return view('home',[
            'title' => 'Home Page',
            'posts' => Post::latest()->limit(5)->get()
        ]);
    }

    public function about()
    {
        return view('about', [
            'name' => 'Vinsensius Alvianto',
            'location' => 'Purwokerto',
            'img' => 'creator.jpg',
            'title' => 'About Page'
        ]);
    }

    public function contact()
    {
        return view('contact', [
            'email' => 'alviantovinsensius@gmail.com',
            'phone' => '085741234567',
            'fb' => 'Vinsensius Alvianto',
            'ig' => '@vinsensius_alvianto',
            'title' => 'Contact Page'
        ]);
    }
}
