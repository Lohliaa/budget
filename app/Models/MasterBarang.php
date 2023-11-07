<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    protected $table = "master_barang";
    protected $primaryKey = 'id';
    protected $fillable = [
        'code',
        'name',
        'satuan',
        'account_1',
        'account_2',
        'account_3',
        'account_4',
        'account_5',
        'account_6',
        'account_7',
        'account_8',
        'account_9',
        'account_10',
    ];

}
