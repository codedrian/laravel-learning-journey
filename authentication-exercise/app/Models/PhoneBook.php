<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Auth;


class PhoneBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_number',
    ];

    public function storeContact($contactData, $userId)
    {
        $contactData['user_id'] = $userId;
        return PhoneBook::create($contactData);
    }


    public function getUserContacts($user): Collection
    {

        return PhoneBook::where('user_id', $user)->get();
    }

    public function getContactById($id)
    {
        $contact = PhoneBook::find($id);
        if ($contact && $contact->user_id !== auth()->id()) {
            abort(403, 'Not found');
        }

        return $contact;
    }
}
