<?php

namespace App\Http\Controllers\Treatment;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Treatment\Treatment;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TreatmentController extends Controller
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

        if (!empty($keyword)) {
            $treatment = Treatment::where('serial_number', 'LIKE', "%$keyword%")
                ->orWhere('prescription_number', 'LIKE', "%$keyword%")
                ->orWhere('teller_name', 'LIKE', "%$keyword%")
                ->orWhere('exchange_date', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $treatment = Treatment::latest()->paginate($perPage);
        }

        return view('treatment.treatment.index', compact('treatment'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('treatment.treatment.create');
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

        $date = Carbon::now()->subDay(1)->format('Y-m-d');
        $this->validate($request, [
      		'serial_number' => 'required|unique:treatments,serial_number,NULL,id,deleted_at,NULL|regex:/^[0-9]+$/|max:30',
      		'prescription_number' => 'required|unique:treatments,prescription_number,NULL,id,deleted_at,NULL|regex:/^[0-9]+$/|max:30',
          'national_id' => 'nullable|size:14|unique:treatments,national_id,NULL,id,deleted_at,NULL',
          'teller_name' => 'required|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
          'exchange_date' => 'nullable|date|after:' . $date,
          'address' => 'nullable|max:255',
          'phone' => 'nullable|regex:/(01)[0-9]{9}/|size:11|unique:treatments,phone,NULL,id,deleted_at,NULL',
          'amount' => 'nullable|regex:/^[0-9]+$/|max:6',
          'reason' => 'nullable|max:500',

      	]);
        $requestData = $request->all();

        Treatment::create($requestData);

        return redirect('treatment/treatment')->with('flash_message', 'تم اضافة علاج');
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
        $treatment = Treatment::findOrFail($id);

        return view('treatment.treatment.show', compact('treatment'));
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
        $treatment = Treatment::findOrFail($id);

        return view('treatment.treatment.edit', compact('treatment'));
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

        $date = Carbon::now()->subDay(1)->format('Y-m-d');
        $this->validate($request, [
          'serial_number' => 'required|unique:treatments,serial_number,'. $id .',id,deleted_at,NULL|regex:/^[0-9]+$/|max:30',
      		'prescription_number' => 'required|unique:treatments,prescription_number,'. $id .',id,deleted_at,NULL|regex:/^[0-9]+$/|max:30',
          'national_id' => 'nullable|size:14|unique:treatments,national_id,'. $id .',id,deleted_at,NULL',
          'teller_name' => 'required|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
          'exchange_date' => 'nullable|date|after:' . $date,
          'address' => 'nullable|max:255',
          'phone' => 'nullable|regex:/(01)[0-9]{9}/|size:11|unique:treatments,phone,'. $id .',id,deleted_at,NULL',
          'amount' => 'nullable|regex:/^[0-9]+$/|max:6',
          'reason' => 'nullable|max:500',

    		]);
        $requestData = $request->all();

        $treatment = Treatment::findOrFail($id);
        $treatment->update($requestData);

        return redirect('treatment/treatment')->with('flash_message', 'تم تعديل العلاج');
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
        Treatment::destroy($id);

        return redirect('treatment/treatment')->with('flash_message', 'تم حذف العلاج');
    }
}
