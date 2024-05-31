<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PhoneBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'contact_number',
        'user_id'
    ];

    public function storeContact($contactData,  $userId)
    {
        $contactData['user_id'] = $userId;
        return PhoneBook::create($contactData);
    }
}
