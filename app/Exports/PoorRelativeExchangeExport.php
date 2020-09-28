<?php

namespace App\Exports;

use App\Poor\FamilyDetail;
use App\Poor\RelativeExchange;
use Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class PoorRelativeExchangeExport implements FromView
{
  public function view(): View
  {
    $id = Request::get('id');
    return view('poor-people.relative-exchange.excel', [
        'families' => FamilyDetail::all(),
        'relative' => RelativeExchange::findOrFail($id),
    ]);
  }
}
