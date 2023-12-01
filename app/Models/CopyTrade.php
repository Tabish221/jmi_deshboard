<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CopyTrade extends Model
{
    protected $table = 'copy_trade';



    public function user()
    {
        return $this->belongsTo('App\Models\website_accounts');
    }



}
