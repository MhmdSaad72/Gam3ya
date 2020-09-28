<?php

namespace App\Http\Controllers\QuranMemorization;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\QuranMemorization\Teacher;
use App\QuranMemorization\Date;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\Rule;


class TeacherController extends Controller
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
            $teacher = Teacher::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('mosque', 'LIKE', "%$keyword%")
                ->orWhere('dates', 'LIKE', "%$keyword%")
                ->orWhere('rewards', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $teacher = Teacher::latest()->paginate($perPage);
        }

        return view('quran-memorization.teacher.index', compact('teacher'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $teacher = new Teacher();
        return view('quran-memorization.teacher.create' , compact('teacher'));
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
    			'mosque' => 'nullable|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'required||regex:/(01)[0-9]{9}/|size:11|unique:teachers,phone,NULL,id,deleted_at,NULL',
          'rewards' => 'nullable|regex:/^[0-9]+$/|max:4|gte:0',
          'time' => 'nullable|date_format:H:i',
    		]);
        $requestData = $request->all();
        if (isset($request->days)) {
          $requestData['days'] = json_encode($request->days);
        }

        Teacher::create($requestData);

        return redirect('quran-memorization/teacher')->with('flash_message', 'تم اضافة محفظ');
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
        $teacher = Teacher::findOrFail($id);

        return view('quran-memorization.teacher.show', compact('teacher'));
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
        $teacher = Teacher::findOrFail($id);

        return view('quran-memorization.teacher.edit', compact('teacher'));
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
    			'mosque' => 'nullable|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'required||regex:/(01)[0-9]{9}/|size:11|unique:teachers,phone,'. $id .',id,deleted_at,NULL',
          'rewards' => 'nullable|regex:/^[0-9]+$/|max:4|gte:0',
          'date' => 'nullable|date',
          'time' => 'nullable|date_format:H:i',
    		]);
        $requestData = $request->all();
        if (isset($request->date)) {
          $requestData['dates'] = $request->date . ' ' . $request->time;
        }

        $teacher = Teacher::findOrFail($id);
        $teacher->update($requestData);

        return redirect('quran-memorization/teacher')->with('flash_message', 'تم تحديث المجفظ');
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
        Date::where('teacher_id' , $id)->delete();
        Teacher::destroy($id);

        return redirect('quran-memorization/teacher')->with('flash_message', 'تم حذف المحفظ');
    }

    /*========================================
      Show the form for creating a new dates.
    ==========================================*/
    public function view_dates($id)
    {
      $teacher = Teacher::findOrFail($id);
      return view('quran-memorization.teacher.dates' , compact('teacher'));
    }


    /*========================================
      Store a newly created dates in storage
    ==========================================*/
    public function store_dates(Request $request,$id)
    {
      $this->validate($request, [
        'days' => 'required',
        'time' => ['required' , 'date_format:H:i' ,
        Rule::unique('dates')->where(function ($query) use ($request) {
          return $query->where('days', $request->days)
          ->whereNull('deleted_at') ;}) ]
      ]);

      $teacher = Teacher::findOrFail($id);

      $requestData = $request->all();
      $requestData['teacher_id'] = $teacher->id ;

      Date::create($requestData);

      return redirect('quran-memorization/teacher')->with('flash_message', 'تم اضافة مواعيد');
    }



    /*====================================================
      Display a listing of the dates for specific teacher.
    ======================================================*/
    public function dates(Request $request , $id)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $dates = Date::where('teacher_id' , $id)
            ->where(function($query) use ($keyword){
                $query->where('days', 'LIKE', "%$keyword%")
                ->orWhere('time', 'LIKE', "%$keyword%");
            })
                ->latest()->paginate($perPage);
        } else {
            $dates = Date::where('teacher_id' , $id)->latest()->paginate($perPage);
        }

        return view('quran-memorization.teacher.edit-dates', compact('dates'));
    }


    /*==============================================
      Show the form for editing the specified date.
    ================================================*/
    public function show_date($id)
    {
        $date = Date::findOrFail($id);
        $date->time = Carbon::parse($date->time)->format('H:i');

        return view('quran-memorization.teacher.update-dates', compact('date'));
    }


    /*========================================
      Update a specified  dates in storage
    ==========================================*/
    public function update_date(Request $request,$id)
    {
      $date = Date::findOrFail($id);
      $this->validate($request, [
        'days' => 'required',
        'time' => ['required' , 'date_format:H:i' ,
        Rule::unique('dates')->where(function ($query) use ($request) {
          return $query->where('days', $request->days)
                       ->whereNull('deleted_at') ;})->ignore($date->id) ]
      ]);


      $requestData = $request->all();
      $date->update($requestData);

      return redirect('quran-memorization/teacher')->with('flash_message', 'تم تعديل الموعد');
    }


    /**
     * Remove the specified date from storage.
     */
    public function destroy_date($id)
    {
        Date::destroy($id);

        return redirect('quran-memorization/teacher')->with('flash_message', 'تم حذف الموعد');
    }


}
