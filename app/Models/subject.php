<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    use HasFactory;
    protected $table = 'subject';
    protected $fillable = ['title', 'content', 'startDate', 'endDate', 'teacherName', 'code'];
}
