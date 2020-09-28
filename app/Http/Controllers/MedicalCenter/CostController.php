<?php

namespace App\Http\Controllers\MedicalCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MedicalCenter\MedicalTool;
use App\MedicalCenter\DoctorSalary;
use Illuminate\Http\Request;

class CostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index_tools(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $tools = MedicalTool::where('name', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $tools = MedicalTool::latest()->paginate($perPage);
        }

        return view('medical-center.tools.index', compact('tools'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create_tools()
    {
        return view('medical-center.tools.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_tools(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    		]);
        $requestData = $request->all();

        MedicalTool::create($requestData);

        return redirect('medical-center/tools')->with('flash_message', 'تم اضافة مستلزمات');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show_tools($id)
    {
        $tool = MedicalTool::findOrFail($id);

        return view('medical-center.tools.show', compact('tool'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit_tools($id)
    {
        $tool = MedicalTool::findOrFail($id);

        return view('medical-center.tools.edit', compact('tool'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update_tools(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    		]);
        $requestData = $request->all();

        $tool = MedicalTool::findOrFail($id);
        $tool->update($requestData);

        return redirect('medical-center/tools')->with('flash_message', 'تم تعديل المستلزمات');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy_tools($id)
    {
        MedicalTool::destroy($id);

        return redirect('medical-center/tools')->with('flash_message', 'تم حذف المستلزمات');
    }
/********************************************************************************************************************************************************************************************************************************************/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index_salary(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $doctor_salaries = DoctorSalary::where('name', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $doctor_salaries = DoctorSalary::latest()->paginate($perPage);
        }

        return view('medical-center.doctor-salary.index', compact('doctor_salaries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create_salary()
    {
        return view('medical-center.doctor-salary.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_salary(Request $request)
    {
        $this->validate($request, [
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'details' => 'nullable|min:3|max:500',
        ]);
        $requestData = $request->all();

        DoctorSalary::create($requestData);

        return redirect('medical-center/doctor-salary')->with('flash_message', 'تم اضافة راتب');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show_salary($id)
    {
        $doctor_salary = DoctorSalary::findOrFail($id);

        return view('medical-center.doctor-salary.show', compact('doctor_salary'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit_salary($id)
    {
        $doctor_salary = DoctorSalary::findOrFail($id);

        return view('medical-center.doctor-salary.edit', compact('doctor_salary'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update_salary(Request $request, $id)
    {
        $this->validate($request, [
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'details' => 'nullable|min:3|max:500',
        ]);
        $requestData = $request->all();

        $tool = DoctorSalary::findOrFail($id);
        $tool->update($requestData);

        return redirect('medical-center/doctor-salary')->with('flash_message', 'تم تعديل الراتب');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy_salary($id)
    {
        DoctorSalary::destroy($id);

        return redirect('medical-center/doctor-salary')->with('flash_message', 'تم حذف الراتب');
    }
}
