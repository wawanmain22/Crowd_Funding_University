<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donor extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'created_at',
        'updated_at',
    ];

    public function donations()
    {
        return $this->hasMany(Donation::class);
    }
}
