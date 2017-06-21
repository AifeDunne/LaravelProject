<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class add_id extends Model
{
    public $timestamps = false;
    protected $table = 'addlistid';
	protected $primaryKey = 'all_id';
    protected $fillable = ['id', 'owner_id'];
}
