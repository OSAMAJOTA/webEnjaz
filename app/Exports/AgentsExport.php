<?php

namespace App\Exports;

use App\agents;
use App\contract;
use App\maids;
use Maatwebsite\Excel\Concerns\FromCollection;


class AgentsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
       return contract::all();


    }
}
