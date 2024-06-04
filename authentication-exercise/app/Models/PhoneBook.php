<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhoneBook extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'contact_number',
        'user_id'
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

    public function destroyContact($id): array
    {
        $affectedRows = $this->where('id', $id)->delete();
        if($affectedRows) {
            return [
                'message' => 'Contact deleted'
            ];
        } else {
            return [
              'message' => 'Contact cannot delete'
            ];
        }
    }
}
