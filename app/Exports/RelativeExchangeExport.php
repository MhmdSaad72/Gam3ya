<?php

namespace App\Exports;

use App\FamilyDetail;
use App\RelativeExchange;
use Request;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class RelativeExchangeExport implements FromView
{
  public function view(): View
  {
    $id = Request::get('id');
    return view('admin.relative-exchange.excel', [
        'families' => FamilyDetail::all(),
        'relative' => RelativeExchange::findOrFail($id),
    ]);
  }
}
