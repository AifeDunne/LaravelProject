<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class list_catalog extends Model
{
	public $timestamps = false;
    protected $table = 'list_catalog';
	protected $primaryKey = 'id';
    protected $fillable = ['id', 'owner_id'];
}
