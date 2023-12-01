<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table = 'documents';



    public function user()
    {
        return $this->belongsTo('App\Models\website_accounts');
    }



}
