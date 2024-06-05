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
use Illuminate\Support\Collection;

class rentExport implements FromCollection,WithHeadings,WithEvents,WithStyles
{ protected $contract;

    public function __construct(Collection $contract)
    {

        $this->contract = $contract;

    }

    /**
   * @return \Illuminate\Support\Collection
  */
 public function collection()
   {


       return $this->contract->map(function ($rent) {
           return [
               'id' => $rent->id,
               'created_at' => $rent->created_at,
               'agents_name' => $rent->agents_name,
               'emp_name' => $rent->emp_name,
               'Duration' => $rent->Duration,
               'tot' => $rent->tot,
               'rest' => $rent->rest,
               'sadad' => $rent->sadad,
               'Created_by' => $rent->Created_by,
           ];
       });
      // return contract::select('id','created_at','agents_name','emp_name','Duration','tot','rest','sadad','Created_by')->orderBy('id', 'desc')->get();
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
                $event->getDelegate()->setRightToLeft(true);
                $event->sheet->getColumnDimension('A')->setWidth(20);
                $event->sheet->getColumnDimension('B')->setWidth(25);
                $event->sheet->getColumnDimension('C')->setWidth(30);
                $event->sheet->getColumnDimension('D')->setWidth(30);
                $event->sheet->getColumnDimension('E')->setWidth(20);
                $event->sheet->getColumnDimension('F')->setWidth(20);
                $event->sheet->getColumnDimension('G')->setWidth(20);
                $event->sheet->getColumnDimension('H')->setWidth(20);
                $event->sheet->getColumnDimension('I')->setWidth(25);
                $event->sheet->getStyle('A:I')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
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

