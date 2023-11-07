<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carline extends Model
{
    use HasFactory;
    protected $table = "carline";
    protected $primaryKey = 'id';
    protected $fillable = [
        'destination_ppc',
        'hfm_carline',
        'model_year',
        'kode'
    ];
}
