<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CheckIn extends Model
{
    use HasFactory;

    protected $fillable = ['entry_date', 'exit_date', 'teacher_id'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class);
    }
}

