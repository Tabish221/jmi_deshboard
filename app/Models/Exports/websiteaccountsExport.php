<?php

namespace App\Exports;

use App\Website_accounts;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class websiteaccountsExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


	$accountlist=Website_accounts::all();

	foreach($accountlist as $account){
        unset($account->id);
        if($account->title == 0){$account->title='Mr';}elseif($account->title == 1){$account->title='Mrs';}elseif($account->title == 2){$account->title='Miss';}
        if($account->gender == 1){$account->gender='Male';}elseif($account->gender == 0){$account->gender='Female';}
        $account->birthday=$account->birthday.'-'.$account->birthmonth.'-'.$account->birthyear;

	}
    
    foreach($accountlist as $account){
        unset($account->id);
        unset($account->password);
        unset($account->birthmonth);
        unset($account->birthyear);
        unset($account->employment_status);
        unset($account->nature_of_business);
        unset($account->annual_income);
        unset($account->net_worth);
        unset($account->account_status);
        unset($account->email_status);
        unset($account->mobile_status);
        unset($account->invited_by);
        unset($account->lastactive);
        unset($account->lastip);
        unset($account->lastbrowser);
        unset($account->lastos);
        unset($account->resettoken);
        unset($account->resettoken_time);


    }

	return $accountlist;

    }



    public function headings(): array
    {
        return [
            'Title',
            'Name',
            'UserName',
            'Email',
            'Gender',
            'Birthday',
            'Country',
            'Town',
            'Post Code',
            'Country Code',
            'Home',
            'Mobile',
            'Address 2',
            'Address 1',


            'Created At',
            'Updated At',

        ];
    }



}