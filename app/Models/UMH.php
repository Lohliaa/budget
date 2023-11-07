<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UMH extends Model
{
    use HasFactory;
    protected $table = "umh";
    protected $primaryKey = 'id';
    protected $fillable = [
        'month',
        'umh',
        'amount',
        'new_umh',
        'new_amount'
    ];
}
