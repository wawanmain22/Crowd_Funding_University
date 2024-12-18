<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone_number',
        'university_name',
        'faculty',
        'major',
        'student_number',
        'created_at',
        'updated_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function fundingRequests()
    {
        return $this->hasMany(FundingRequest::class, 'user_student_id');
    }
}
