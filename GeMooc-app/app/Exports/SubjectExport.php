<?php

namespace App\Exports;

use App\subject;
use Maatwebsite\Excel\Concerns\FromCollection;

class SubjectExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        
        return subject::find(1)->courses()->get();
    }
}
