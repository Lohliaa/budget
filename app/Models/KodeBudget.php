<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeBudget extends Model
{
    use HasFactory;
    protected $table = "kode_budget";
    protected $primaryKey = 'id';
    protected $fillable = [
      'kode_budget',
    ];
}
