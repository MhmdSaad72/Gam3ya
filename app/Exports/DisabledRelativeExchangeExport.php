<?php

namespace App\Exports;

use App\Disabled\FamilyDetail;
use App\Disabled\RelativeExchange;
use Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DisabledRelativeExchangeExport implements FromView
{
  public function view(): View
  {
    $id = Request::get('id');
    return view('disabled.relative-exchange.excel', [
        'families' => FamilyDetail::all(),
        'relative' => RelativeExchange::findOrFail($id),
    ]);
  }
}
