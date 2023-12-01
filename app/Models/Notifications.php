<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notifications extends Model
{
    protected $table = 'notifications';



    public function user()
    {

        return $this->belongsTo('App\Models\website_accounts');
    }





}
