<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deadline extends Model
{
    use HasFactory;
    protected $table = "deadline";
    protected $primaryKey = 'id';
    protected $fillable = [
      'deadline_date',
      'deadline_time'
    ];
}
