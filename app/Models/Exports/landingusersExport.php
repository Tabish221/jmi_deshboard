<?php

namespace App\Exports;

use App\landingusers;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class landingusersExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


	$landinglist=landingusers::all();
	foreach($landinglist as $user){

        $user->name=$user->name.' '.$user->lname;
        $user->phone=$user->code.' '.$user->phone;

	}
    foreach($landinglist as $user){
        unset($user->id);
        unset($user->lname);
        unset($user->code);

    }

	return $landinglist;


    }



    public function headings(): array
    {
        return [
            'Name',
            'Email',
            'Country',
            'Phone',
            'Created At',
            'Updated At',
        ];
    }



}