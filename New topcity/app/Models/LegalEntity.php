<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalEntity extends Model
{
    protected $fillable = [
        'inn',
        'organization_name',
        'legal_address',
        'email',
        'first_name',
        'last_name',
        'patronymic_name',
        'phone',
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
