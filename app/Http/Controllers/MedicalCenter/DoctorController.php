<?php

namespace App\Http\Controllers\MedicalCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MedicalCenter\Doctor;
use App\MedicalCenter\DoctorDates;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

class DoctorController extends Controller
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
            $doctor = Doctor::where('name', 'LIKE', "%$keyword%")
                ->orWhere('specialization', 'LIKE', "%$keyword%")
                ->orWhere('salary', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doctor = Doctor::latest()->paginate($perPage);
        }

        return view('medical-center.doctor.index', compact('doctor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('medical-center.doctor.create');
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
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'specialization' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'salary' => 'nullable|regex:/^[0-9]+$/|max:6',
    		]);
        $requestData = $request->all();

        Doctor::create($requestData);

        return redirect('medical-center/doctor')->with('flash_message', 'تم اضافة طبيب');
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
        $doctor = Doctor::findOrFail($id);

        return view('medical-center.doctor.show', compact('doctor'));
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
        $doctor = Doctor::findOrFail($id);

        return view('medical-center.doctor.edit', compact('doctor'));
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
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'specialization' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'salary' => 'nullable|regex:/^[0-9]+$/|max:6',
    		]);
        $requestData = $request->all();

        $doctor = Doctor::findOrFail($id);
        $doctor->update($requestData);

        return redirect('medical-center/doctor')->with('flash_message', 'تم تحديث الطبيب');
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
        DoctorDates::where('doctor_id' , $id)->delete();
        Doctor::destroy($id);

        return redirect('medical-center/doctor')->with('flash_message', 'تم حذف الطبيب');
    }

    /*========================================
      Show the form for creating a new dates.
    ==========================================*/
    public function view_dates($id)
    {
      $doctor = Doctor::findOrFail($id);
      return view('medical-center.doctor.add-dates' , compact('doctor'));
    }

    /*========================================
      Store a newly created dates in storage
    ==========================================*/
    public function store_dates(Request $request,$id)
    {
      $this->validate($request, [
        'days' => 'required',
        'time' => ['required' , 'date_format:H:i' ,
        Rule::unique('doctor_dates')->where(function ($query) use ($request) {
          return $query->where('days', $request->days)
          ->whereNull('deleted_at') ;}) ]
      ]);

      $doctor = Doctor::findOrFail($id);

      $requestData = $request->all();
      $requestData['doctor_id'] = $doctor->id ;

      DoctorDates::create($requestData);

      return redirect('medical-center/doctor')->with('flash_message', 'تم اضافة مواعيد');
    }

    /*====================================================
      Display a listing of the dates for specific teacher.
    ======================================================*/
    public function dates(Request $request , $id)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $dates = DoctorDates::where('doctor_id' , $id)
            ->where(function($query) use ($keyword){
                $query->where('days', 'LIKE', "%$keyword%")
                ->orWhere('time', 'LIKE', "%$keyword%");
            })
                ->latest()->paginate($perPage);
        } else {
            $dates = DoctorDates::where('doctor_id' , $id)->latest()->paginate($perPage);
        }

        return view('medical-center.doctor.edit-dates', compact('dates'));
    }

    /*==============================================
      Show the form for editing the specified date.
    ================================================*/
    public function edit_dates($id)
    {
        $date = DoctorDates::findOrFail($id);
        $date->time = Carbon::parse($date->time)->format('H:i');

        return view('medical-center.doctor.update-date', compact('date'));
    }


    /*========================================
      Update a specified  dates in storage
    ==========================================*/
    public function update_date(Request $request,$id)
    {
      $date = DoctorDates::findOrFail($id);

      $this->validate($request, [
        'days' => 'required',
        'time' => ['required' , 'date_format:H:i' ,
        Rule::unique('doctor_dates')->where(function ($query) use ($request) {
          return $query->where('days', $request->days)
                       ->whereNull('deleted_at') ;})->ignore($date->id) ]
      ]);


      $requestData = $request->all();
      $date->update($requestData);

      return redirect('medical-center/doctor')->with('flash_message', 'تم تعديل الموعد');
    }


    /**
     * Remove the specified date from storage.
     */
    public function destroy_date($id)
    {
        DoctorDates::destroy($id);

        return redirect('medical-center/doctor')->with('flash_message', 'تم حذف الموعد');
    }
}
