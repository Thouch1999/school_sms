<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';
    protected $primaryKey = 'student_id';
    protected $fillable = [
        'student_code',
        'full_name',
        'gender',
        'date_of_birth',
        'phone',
        'email',
        'address',
        'nationality',
        'photo',
        'status',
    ];
}
