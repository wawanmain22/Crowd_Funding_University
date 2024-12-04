<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Donation extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'donor_id',
        'amount',
        'description',
    ];

    public function donor()
    {
        return $this->belongsTo(Donor::class);
    }
}
