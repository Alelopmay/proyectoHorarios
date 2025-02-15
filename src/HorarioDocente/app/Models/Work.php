<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;

    protected $fillable = ['teacher_id', 'institute_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }

    public function institute()
    {
        return $this->belongsTo(Institute::class);
    }
}
