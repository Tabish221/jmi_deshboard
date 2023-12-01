<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fx_accounts extends Model
{
    protected $table = 'fx_accounts';



    public function user()
    {
        return $this->belongsTo('App\Models\website_accounts');
    }





}
