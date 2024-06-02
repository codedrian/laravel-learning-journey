<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Models\PhoneBook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PhoneBookController extends Controller
{
    public function showAddForm(): View
    {
        return view('phonebook.create_contact');
    }

    public function storeContact(StoreContactRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $userId = Auth::id();
        $phone_book = new PhoneBook();
        $phone_book->storeContact($validated, $userId);
        return redirect()->back();
    }

    public function getUserContacts()
    {
        $user = Auth::id();
        $result = (new PhoneBook())->getUserContacts($user);
        return response()->json($result);
    }
/** This method is to get a specific contact*/
    public function getContactById($id)
    {
        $result = (new PhoneBook())->getContactById($id, $user);
        return response()->json($result);
    }
}
