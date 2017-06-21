<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class user_stats extends Model
{
public $timestamps = false;
protected $table = 'user_stats';
protected $primaryKey = 'owner_id';
public $incrementing = false;
protected $fillable = ['id', 'owner_id', 'crnt_count', 'list_count', 'all_count'];

  public function user() 
   {
      return $this->belongsTo('App\User');
   }

}
