<?php

namespace App\Exports;

use App\FamilyDetail;
use App\MonthlyExchange;
use Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MonthlyExchangeExport implements FromView
{
    /**
    * @return \Illuminate\Support\FromView
    */
    public function view(): View
    {
      $id = Request::get('id');
      return view('admin.monthly-exchange.excel', [
          'families' => FamilyDetail::all(),
          'month' => MonthlyExchange::findOrFail($id)
      ]);
    }
}
