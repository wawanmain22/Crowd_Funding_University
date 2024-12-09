<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_number',
        'position',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function reviewedFundingRequests()
    {
        return $this->hasMany(FundingRequest::class, 'user_reviewer_id');
    }

    public function disbursements()
    {
        return $this->hasMany(Disbursement::class, 'user_reviewer_id');
    }
}
