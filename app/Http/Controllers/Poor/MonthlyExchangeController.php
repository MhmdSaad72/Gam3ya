<?php

namespace App\Http\Controllers\Poor;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Poor\MonthlyExchange;
use App\Poor\FamilyDetail;
// use App\Poor\MonthlyExchange;
use App\Exports\MonthlyExchangeExport;
use App\Exports\PoorMonthlyExchangeExport;
use Maatwebsite\Excel\Facades\Excel;
// use App\Host;
use DB;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class MonthlyExchangeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;
        $month = new MonthlyExchange();

        if (!empty($keyword)) {
            $monthlyexchanges = MonthlyExchange::where('year', 'LIKE', "%$keyword%")
                ->orWhere('month', 'LIKE', $month->monthSearch($keyword))
                ->latest()->paginate($perPage);
        } else {
            $monthlyexchanges = MonthlyExchange::latest()->paginate($perPage);
        }

        return view('poor-people.monthly-exchange.index', compact('monthlyexchanges'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $thisYear = \Carbon\Carbon::now()->format('Y') ;
        $month = new MonthlyExchange();
        return view('poor-people.monthly-exchange.create' , compact('thisYear' ,'month'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
    			'year' => 'required',
          'month' => ['required',
          Rule::unique('poor_monthly_exchange')->where(function ($query) use ($request) {
            return $query->where('year', $request->year)
                         ->whereNull('deleted_at') ;}) ]
    		]);
        $requestData = $request->all();
        $month = \Carbon\Carbon::now()->format('m') ;
        if ($requestData['month'] < $month) {
          return redirect()->back()->with('error' , 'يجب أن يكون الشهر (الشهر الحالي او من الشهور القادمة)')->withInput();
        }

        MonthlyExchange::create($requestData);

        return redirect('poor-people/monthly-exchange')->with('flash_message', 'تم اضافة صرف شهري!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $monthlyexchange = MonthlyExchange::findOrFail($id);

        return view('poor-people.monthly-exchange.show', compact('monthlyexchange'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $monthlyexchange = MonthlyExchange::findOrFail($id);
        $thisYear = \Carbon\Carbon::now()->format('Y') ;
        return view('poor-people.monthly-exchange.edit', compact('monthlyexchange' , 'thisYear'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $monthlyexchange = MonthlyExchange::findOrFail($id);
        $this->validate($request, [
          'year' => 'required',
          'month' => ['required',
          Rule::unique('poor_monthly_exchange')->where(function ($query) use ($request) {
            return $query->where('year', $request->year)
                         ->whereNull('deleted_at') ;})->ignore($monthlyexchange->id) ]
    		]);
        $requestData = $request->all();
        $month = \Carbon\Carbon::now()->format('m') ;
        if ($requestData['month'] < $month) {
          return redirect()->back()->with('error' , 'يجب أن يكون الشهر (الشهر الحالي او من الشهور القادمة)')->withInput();
        }

        $monthlyexchange->update($requestData);

        return redirect('poor-people/monthly-exchange')->with('flash_message', 'تم تحديث الصرف الشهري!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        MonthlyExchange::destroy($id);

        return redirect('poor-people/monthly-exchange')->with('flash_message', 'تم حذف الصرف الشهري!');
    }
    /*=============================================
    Display Family details page in monthly exchange
    =============================================== */
    public function familyDetails($id)
    {
      $monthlyexchange = MonthlyExchange::findOrFail($id);
      $families = FamilyDetail::whereHas('children')->where('created_at' , '<=', $monthlyexchange->created_at)->get();
      $year = $monthlyexchange->year ;
      $month = $monthlyexchange->month ;
      return view('poor-people.monthly-exchange.family' , compact('families' , 'monthlyexchange' , 'year' , 'month'));
    }

    /*=======================================
               Display scan page
    ========================================= */
    public function barcodes($id)
    {
      $monthlyexchange = MonthlyExchange::findOrFail($id);
      // $families = FamilyDetail::all();
      return view('poor-people.monthly-exchange.barcodes' , compact('monthlyexchange'));
    }

    /*=======================================
       Check monthly exchange with barcode
    ========================================= */
    public function checkBarcode(Request $request , $id)
    {

      $this->validate($request , [
        'barcode' => 'required' ,
      ]);

      $month = MonthlyExchange::findOrFail($id);
      $barcode = $request->barcode ;

      if (substr($barcode ,0 ,4) == 2000) {
          $care_number = substr($barcode ,4);
      }else {
          return redirect()->back()->with(['error' => 'باركود غير صالح' , 'autofocus' => true])->withInput();
      }

      $family = FamilyDetail::whereHas('children')->where('care_number' , $care_number)->where('created_at' , '<=' , $month->created_at)->first();

      if ($family) {
          $checked = DB::table('poor_month_costs')->where('family_id' , $family->id)->where('monthly_id' ,$month->id)->first();

          if (!$checked) {
              $monthChecked = DB::table('poor_month_costs')->insert([
                'checked' => 1 ,
                'family_id' => $family->id ,
                'monthly_id' => $month->id,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now(),
              ]);

              return redirect()->back()->with(['message' => 'تم فحص الباركود بنجاح' ,'autofocus' => true]);
        }else {
            return redirect()->back()->with(['error' => 'تم فحص هذا الباركود من قبل' , 'autofocus' => true])->withInput();
        }
      }else {
        return redirect()->back()->with(['error' => 'باركود غير صالح' , 'autofocus' => true])->withInput();
      }
    }

    /*=========================================
     Generate excel sheet for monthly exchange
    =========================================== */
    public function viewExport()
    {
      return Excel::download(new PoorMonthlyExchangeExport(), 'Excel.xlsx');
    }
}
