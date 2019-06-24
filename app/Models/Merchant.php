<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    //
    protected $table = 'merchants';

    protected $fillable = ['user_id', 'company_name', 'logo', 'overview', 'web_url', 'facebook_url',
        'twitter_url', 'google_url', 'pinterest_url', 'country', 'state', 'city', 'address', 'phone', 'zip'];

}
