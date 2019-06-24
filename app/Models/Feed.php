<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    //
    protected $table = 'feeds';
    
    protected $fillable = ['merchant_id', 'url', 'approved', 'update_id', 'update_mode'];
}
