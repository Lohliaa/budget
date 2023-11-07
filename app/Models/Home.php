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
    'qty',
    'price',
    'amount',
    'order_plan',
    'delivery_plan',
    'fixed',
    'prep',
    'kode_carline',
    'remark',
    'role_id'
  ];
  public function user()
  {
      return $this->belongsTo(User::class, 'user_id', 'id');
  }
  
}
