<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProsesNariyuki extends Model
{
    use HasFactory;
    protected $table = "proses_nariyuki";
    protected $primaryKey = 'id';
    protected $fillable = [
        'tahun',
        'month',
        'section',
        'kode_budget',
        'fixed',
        'umh',
        'amount',
        'new_umh',
        'new_amount'
    ];
}
