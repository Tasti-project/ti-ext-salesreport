<?php

namespace Tasti\SalesReport\Classes\Exports;

use Illuminate\Support\Arr;
use Illuminate\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportsExport implements FromView
{

    protected $records;
    protected $columns = [];
    protected $gross;

    public function __construct($columns, $records, $gross = [])
    {
        $this->records = $records;
        $this->columns = $this->prepareColumns($columns);
        $this->gross = $gross;
    }


    public function view(): View
    {
        return view('admin::_exports.sales_report', [
            'columns' => $this->columns,
            'records' => $this->records,
            'gross' => $this->gross
        ]);
    }

    public function prepareColumns($columns){
        $cols = [];
        if(!empty($columns)){
            foreach($columns as $ck  => $col){
                $cols[] = lang(Arr::get($col,'label',$ck));
            }
        }
        return $cols;
    }
}
