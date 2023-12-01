<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Website_accounts extends Model
{

    protected $table = 'website_accounts';



    public function documents()
    {
        return $this->hasMany('App\Models\Documents');
    }

    public function fx_accounts_demo()
    {
        return $this->hasMany('App\Models\Fx_accounts')->where('account_radio_type',0);
    }


    public function fx_accounts_live()
    {
        return $this->hasMany('App\Models\Fx_accounts')->where('account_radio_type',1);
    }

    public function all_transactions()
    {
        return $this->hasMany('App\Models\Transactions')->orderBy('created_at','desc');
    }

    public function deposit_transactions()
    {
        return $this->hasMany('App\Models\Transactions')->where('type',0)->orderBy('created_at','desc');
    }

    public function withdraw_transactions()
    {
        return $this->hasMany('App\Models\Transactions')->where('type',1)->orderBy('created_at','desc');
    }


    public function transfeer_transactions()
    {
        return $this->hasMany('App\Models\Transactions')->where('type',2)->orderBy('created_at','desc');
    }


      public function notifications_all()
    {
        return $this->hasMany('App\Models\Notifications');
    }


    public function notifications_unseen()
    {
        return $this->hasMany('App\Models\Notifications')->where('status',0);
    }






}
