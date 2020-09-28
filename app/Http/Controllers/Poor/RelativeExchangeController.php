<?php

namespace App\Http\Controllers\Poor;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Poor\RelativeExchange;
use App\Poor\Category;
use App\Poor\FamilyDetail;
use Illuminate\Http\Request;
use DB;
use App\Exports\PoorRelativeExchangeExport;
use Maatwebsite\Excel\Facades\Excel;

class RelativeExchangeController extends Controller
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
        $relative = new RelativeExchange();

        if (!empty($keyword)) {
            $relativeexchange = RelativeExchange::where('unit', 'LIKE', "%$keyword%")
                ->orWhere('distribution_type', 'LIKE', "%$keyword%")
                ->orWhere('quantity', 'LIKE', "%$keyword%")
                ->orWhere('unit', 'LIKE', $relative->unitSearch($keyword))
                ->orWhere('distribution_type', 'LIKE', $relative->distrSearch($keyword))
                ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");})
                ->latest()->paginate($perPage);
        } else {
            $relativeexchange = RelativeExchange::latest()->paginate($perPage);
        }

        return view('poor-people.relative-exchange.index', compact('relativeexchange'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('poor-people.relative-exchange.create' , compact('categories'));
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
    			'unit' => 'required',
          'distribution_type' => 'required',
          'category_id' => 'required',
          'quantity' => 'required|max:6|gte:0',
    		]);
        $requestData = $request->all();

        RelativeExchange::create($requestData);

        return redirect('poor-people/relative-exchange')->with('flash_message', 'تم اضافة صرف عيني!');
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
        $relativeexchange = RelativeExchange::findOrFail($id);

        return view('poor-people.relative-exchange.show', compact('relativeexchange'));
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
        $relativeexchange = RelativeExchange::findOrFail($id);
        $categories = Category::all();
        return view('poor-people.relative-exchange.edit', compact('relativeexchange' , 'categories'));
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
        $this->validate($request, [
          'unit' => 'required',
          'distribution_type' => 'required',
          'category_id' => 'required',
          'quantity' => 'required|max:6|gte:0',
    		]);
        $requestData = $request->all();

        $relativeexchange = RelativeExchange::findOrFail($id);
        $relativeexchange->update($requestData);

        return redirect('poor-people/relative-exchange')->with('flash_message', 'تم تحديث الصرف العيني!');
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
        RelativeExchange::destroy($id);

        return redirect('poor-people/relative-exchange')->with('flash_message', 'تم حذف الصرف العيني!');
    }

    /*=======================================
       Family details for relative exchange
    ========================================= */
    public function familyDetails($id)
    {
      $relativeexchange = RelativeExchange::findOrFail($id);
      $families = FamilyDetail::whereHas('children')->where('created_at' , '<=' , $relativeexchange->created_at)->where('category_id' , $relativeexchange->category_id)->get();
      return view('poor-people.relative-exchange.family' , compact('families' , 'relativeexchange'));
    }

    /*=======================================
               Display scan page
    ========================================= */
    public function barcodes($id)
    {
      $relativeexchange = RelativeExchange::findOrFail($id);
      // $families = FamilyDetail::all();
      return view('poor-people.relative-exchange.barcodes' , compact('relativeexchange'));
    }

    /*=======================================
       Check monthly exchange with barcode
    ========================================= */
    public function checkBarcode(Request $request , $id)
    {

      $this->validate($request , [
        'barcode' => 'required' ,
      ]);

      $relative = RelativeExchange::findOrFail($id);
      $barcode = $request->barcode ;

      if (substr($barcode ,0 ,4) == 2000) {
          $care_number = substr($barcode ,4);
      }else {
          return redirect()->back()->with(['error' => 'باركود غير صالح' , 'autofocus' => true])->withInput();
      }

      $family = FamilyDetail::whereHas('children')->where('care_number' , $care_number)->where('created_at' , '<=' , $relative->created_at)->first();

      if ($family) {
          $checked = DB::table('poor_relative_costs')->where('family_id' , $family->id)->where('relative_id' ,$relative->id)->first();

          if (!$checked) {
              $relativeChecked = DB::table('poor_relative_costs')->insert([
                'checked' => 1 ,
                'family_id' => $family->id ,
                'relative_id' => $relative->id,
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
     Generate excel sheet for relative exchange
    =========================================== */
    public function viewExport()
    {
      return Excel::download(new PoorRelativeExchangeExport(), 'Excel.xlsx');
    }
}
