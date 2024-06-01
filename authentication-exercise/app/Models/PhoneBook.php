<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
}
