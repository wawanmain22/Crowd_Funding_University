<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FundingRequest extends Model
{
    protected $fillable = [
        'user_student_id',
        'user_reviewer_id',
        'amount_requested',
        'reason',
        'supporting_document',
        'status',
        'reviewer_note',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class, 'user_student_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(Admin::class, 'user_reviewer_id');
    }

    public function disbursement()
    {
        return $this->hasOne(Disbursement::class);
    }
}
