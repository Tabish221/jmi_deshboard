<?php

namespace App\Exports;

use App\maillist;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class maillistExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {


	$maillist=maillist::all();
	foreach($maillist as $mail){
		unset($mail->id);
		if($mail->title == 0){$mail->title='Mr';}elseif($mail->title == 1){$mail->title='Mrs';}elseif($mail->title == 2){$mail->title='Miss';}

	}
	return $maillist;


    }



    public function headings(): array
    {
        return [
            'Mail',
            'Title',
            'Name',
            'Created At',
            'Updated At',
        ];
    }



}
