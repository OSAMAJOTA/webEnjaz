<?php

namespace App\Exports;

use App\careers;
use App\contract;
use App\employees;
use App\nationalities;
use App\RentController;
use http\Env\Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Events\BeforeSheet;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Maatwebsite\Excel\Concerns\WithStyles;


class rentExport implements FromCollection,WithHeadings,WithEvents,WithStyles
{
    /**
   * @return \Illuminate\Support\Collection
  */
 public function collection()
   {

       return contract::select('id','created_at','agents_name','emp_name','Duration','tot','rest','sadad','Created_by')->orderBy('id', 'desc')->get();
  }

    public function headings(): array
    {
        return [
            'رقم العقد',
            'تاريخ الانشاء',
            'اسم العميل',
            ' اسم العامل',
            'مدة العقد',
            'الاجمالى',
            'المتبقى ',
            'تم سداد',
            'تم الانشاء بواسطة',


        ];
    }

    public function registerEvents(): array
    {
        return [

            BeforeSheet::class  =>function(BeforeSheet $event){
                $event->getDelegate()->setRightToLeft(true)->getRowDimension('2')->setRowHeight(40)->setAutoSize(true);
            }
        ];
    }


    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            1    => ['font' => ['bold' => true]],


        ];

    }


}

