<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Disbursement extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'funding_request_id',
        'user_reviewer_id',
        'amount',
        'disbursement_proof',
        'status',
        'created_at',
        'updated_at',
    ];

    public function fundingRequest()
    {
        return $this->belongsTo(FundingRequest::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(Admin::class, 'user_reviewer_id');
    }
}
