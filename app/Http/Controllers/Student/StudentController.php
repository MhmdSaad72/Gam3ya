<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Student\Student;
use Illuminate\Http\Request;
use Carbon\Carbon;

class StudentController extends Controller
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
            $student = Student::where('name', 'LIKE', "%$keyword%")
                ->orWhere('father_name', 'LIKE', "%$keyword%")
                ->orWhere('mother_name', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->orWhere('father_national_id', 'LIKE', "%$keyword%")
                ->orWhere('mother_national_id', 'LIKE', "%$keyword%")
                ->orWhere('birth_date', 'LIKE', "%$keyword%")
                ->orWhere('school', 'LIKE', "%$keyword%")
                ->orWhere('band', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $student = Student::latest()->paginate($perPage);
        }

        return view('student.student.index', compact('student'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('student.student.create');
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

        $today = Carbon::now()->format('Y-m-d');
        $this->validate($request, [
  			'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
  			'father_name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
  			'mother_name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
        'father_national_id' => 'nullable|size:14|unique:students,father_national_id,NULL,id,deleted_at,NULL|different:mother_national_id|different:national_id',
        'mother_national_id' => 'nullable|size:14|unique:students,mother_national_id,NULL,id,deleted_at,NULL|different:father_national_id|different:national_id',
        'national_id' => 'nullable|size:14|unique:students,national_id,NULL,id,deleted_at,NULL|different:mother_national_id|different:father_national_id',
        'school' => 'nullable|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
        'band' => 'nullable|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
        'birth_date' => 'nullable|date|before:' . $today ,
        'register' => 'file|mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv',
  		]);
      // 'size_value'=>'required|unique:sizes,size_value,NULL,NULL,size_metric,'.$request->size_metric
        $requestData = $request->all();
        if ($request->hasFile('register')) {
            $requestData['register'] = $request->file('register')
                                            ->store('uploads', 'public');
        }

        Student::create($requestData);

        return redirect('student/student')->with('flash_message', 'تم اضافة الطالب');
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
        $student = Student::findOrFail($id);
        // $file= public_path(). '//storage/' . $student->register;
        $pathInfo = pathinfo(public_path(). '//storage/' . $student->register);
        $extension = $pathInfo['extension'] ?? '' ;

        return view('student.student.show', compact('student' , 'extension'));
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
        $student = Student::findOrFail($id);

        return view('student.student.edit', compact('student'));
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
        $today = Carbon::now()->format('Y-m-d');
        $this->validate($request, [
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'father_name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'mother_name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'father_national_id' => 'nullable|size:14|unique:students,father_national_id,'. $id .',id,deleted_at,NULL|different:national_id|different:mother_national_id',
          'mother_national_id' => 'nullable|size:14|unique:students,mother_national_id,'. $id .',id,deleted_at,NULL|different:father_national_id|different:national_id',
          'national_id' => 'nullable|size:14|unique:students,national_id,'. $id .',id,deleted_at,NULL|different:father_national_id|different:mother_national_id',
          'school' => 'nullable|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'band' => 'nullable|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'birth_date' => 'nullable|date|before:' . $today ,
          'register' => 'file|mimes:jpeg,png,jpg,gif,svg,pdf,xlx,csv',

    		]);

        $requestData = $request->all();
        if ($request->hasFile('register')) {
            $requestData['register'] = $request->file('register')
                                            ->store('uploads', 'public');
        }

        $student = Student::findOrFail($id);
        $student->update($requestData);

        return redirect('student/student')->with('flash_message', 'تم تعديل الطالب');
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
        Student::destroy($id);

        return redirect('student/student')->with('flash_message', 'تم حذف الطالب');
    }
}
