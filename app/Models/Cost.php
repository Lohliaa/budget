<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cost extends Model
{
  use HasFactory;
  protected $table = "cost";
  protected $primaryKey = 'id';
  protected $fillable = [
    'cost_center',
    'detail_cost_center'
  ];

  public function user()
  {
      return $this->hasOne(User::class, 'cost_center', 'cost_center');
  }
  
}
