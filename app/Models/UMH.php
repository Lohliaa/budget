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
        'ltp_jul',
        'ltp_aug',
        'ltp_sep',
        'ltp_okt',
        'ltp_nov',
        'ltp_dec',
        'ltp_jan',
        'ltp_feb',
        'ltp_mar',
        'ltp_apr',
        'ltp_may',
        'ltp_jun',

        'stp_jul',
        'stp_aug',
        'stp_sep',
        'stp_okt',
        'stp_nov',
        'stp_dec',
        'stp_jan',
        'stp_feb',
        'stp_mar',
        'stp_apr',
        'stp_may',
        'stp_jun',

    ];
}
