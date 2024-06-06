<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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

    public function editContact($contactData): array
    {
        $contact = $this->find($contactData['id'])
            ->update([
                'name' => $contactData['name'],
                'contact_number' => $contactData['contact_number']
            ]);
        if($contact) {
            return [
                'message' => 'Contact updated',
                'contact_number' => $contactData['contact_number'],
                'name' => $contactData['name']
            ];
        } else {
            return [
                'message' => 'Contact cannot update'
            ];
        }

    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
