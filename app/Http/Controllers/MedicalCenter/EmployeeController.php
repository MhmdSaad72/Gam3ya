<?php

namespace App\Http\Controllers\MedicalCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MedicalCenter\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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
            $employee = Employee::where('name', 'LIKE', "%$keyword%")
                ->orWhere('job', 'LIKE', "%$keyword%")
                ->orWhere('salary', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $employee = Employee::latest()->paginate($perPage);
        }

        return view('medical-center.employee.index', compact('employee'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('medical-center.employee.create');
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
          'job' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'national_id' => 'nullable|size:14|unique:employees,national_id,NULL,id,deleted_at,NULL',
          'salary' => 'nullable|regex:/^[0-9]+$/|max:6',
    		]);
        $requestData = $request->all();

        Employee::create($requestData);

        return redirect('medical-center/employee')->with('flash_message', 'تم اضافة موظف');
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
        $employee = Employee::findOrFail($id);

        return view('medical-center.employee.show', compact('employee'));
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
        $employee = Employee::findOrFail($id);

        return view('medical-center.employee.edit', compact('employee'));
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
          'job' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'national_id' => 'nullable|size:14|unique:employees,national_id,'. $id .',id,deleted_at,NULL',
          'salary' => 'nullable|regex:/^[0-9]+$/|max:6',
    		]);
        $requestData = $request->all();

        $employee = Employee::findOrFail($id);
        $employee->update($requestData);

        return redirect('medical-center/employee')->with('flash_message', 'تم تحديث الموظف');
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
        Employee::destroy($id);

        return redirect('medical-center/employee')->with('flash_message', 'تم حذف الموظف');
    }
}
