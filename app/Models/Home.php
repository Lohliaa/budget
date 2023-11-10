<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
  use HasFactory;

  protected $table = "home";
  protected $primaryKey = 'id';
  protected $fillable = [
    'section',
    'code',
    'nama',
    'kode_budget',
    'cur',
    'fixed',
    'prep',
    'kode_carline',
    'remark',
    'qty_jul',
    'price_jul',
    'amount_jul',
    'qty_aug',
    'price_aug',
    'amount_aug',
    'qty_sep',
    'price_sep',
    'amount_sep',
    'qty_okt',
    'price_okt',
    'amount_okt',
    'qty_nov',
    'price_nov',
    'amount_nov',
    'qty_dec',
    'price_dec',
    'amount_dec',
    'qty_jan',
    'price_jan',
    'amount_jan',
    'qty_feb',
    'price_feb',
    'amount_feb',
    'qty_mar',
    'price_mar',
    'amount_mar',
    'qty_apr',
    'price_apr',
    'amount_apr',
    'qty_may',
    'price_may',
    'amount_may',
    'qty_jun',
    'price_jun',
    'amount_jun',
    'role_id'
  ];
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id', 'id');
  }
  
}
