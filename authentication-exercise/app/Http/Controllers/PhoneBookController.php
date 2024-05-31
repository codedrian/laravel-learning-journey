<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PhoneBookController extends Controller
{
    public function showAddForm(): View
    {
        return view('phonebook.create_contact');
    }
    /*public function storeContact(StoreContactRequest $request)
    {

    }*/
}
