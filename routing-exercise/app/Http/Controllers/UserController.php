<?php

namespace App\Http\Controllers;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function main()
    {
        return 'I am main class';
    }

    public function hello()
    {
        return 'Hello World!';
    }

    public function say_anything($word = null)
    {
        if ($word) {
            return strtoupper($word);
        } else {
            return 'Please enter a word at the end of the page link!';
        }
    }

    public function danger()
    {
        return redirect('/main');
    }
}
