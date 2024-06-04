<?php

namespace App\Http\Controllers;

use App\Http\Requests\DestroyContactRequest;
use App\Http\Requests\StoreContactRequest;
use App\Models\PhoneBook;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
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
        $phone_book = new PhoneBook();
        $phone_book->storeContact($validated);

        return redirect()->back();
    }

    /** This method is to get a specific contact*/
    public function getContactById($id)
    {
        $result = (new PhoneBook())->getContactById($id);

        return response()->json($result);
    }

    public function destroyContact(DestroyContactRequest $request)
    {
        $validated = $request->validated();
        $response = (new PhoneBook())->destroyContact($validated);

        return response()->json($response);
    }

    public function editContact(Request $request)
    {
        dd($request);
    }
}
