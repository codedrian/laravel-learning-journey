<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhoneBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_number',
    ];

    public function storeContact($contactData)
    {
        return PhoneBook::create($contactData);
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
