<?php

namespace App\Exports;

use App\Disabled\FamilyDetail;
use App\Disabled\MonthlyExchange;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Request;
// use Illuminate\Support\Facades\Input;

class DisabledMonthlyExchangeExport implements FromView
{
  /**
  * @return \Illuminate\Support\FromView
  */
  public function view(): View
  {
    $id = Request::get('id');
    return view('disabled.monthly-exchange.excel', [
        'families' => FamilyDetail::all(),
        'month' => MonthlyExchange::findOrFail($id)
    ]);
  }
}
