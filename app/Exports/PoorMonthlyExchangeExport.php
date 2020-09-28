<?php

namespace App\Exports;

use App\Poor\FamilyDetail;
use App\Poor\MonthlyExchange;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Request;
// use Illuminate\Support\Facades\Input;

class PoorMonthlyExchangeExport implements FromView
{
  /**
  * @return \Illuminate\Support\FromView
  */
  public function view(): View
  {
    $id = Request::get('id');
    return view('poor-people.monthly-exchange.excel', [
        'families' => FamilyDetail::all(),
        'month' => MonthlyExchange::findOrFail($id)
    ]);
  }
}
