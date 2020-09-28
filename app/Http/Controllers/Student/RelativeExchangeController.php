<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Student\RelativeExchange;
use App\Student\Student;
use Illuminate\Http\Request;

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

        if (!empty($keyword)) {
            $relativeexchange = RelativeExchange::where('amount', 'LIKE', "%$keyword%")
                ->orWhere('reason', 'LIKE', "%$keyword%")
                ->orWhereHas('student', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");})
                ->latest()->paginate($perPage);
        } else {
            $relativeexchange = RelativeExchange::latest()->paginate($perPage);
        }

        return view('student.relative-exchange.index', compact('relativeexchange'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $students = Student::all();
        return view('student.relative-exchange.create' , compact('students'));
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
    			'student_id' => 'required',
          'amount' => 'required|regex:/^[0-9]+$/|max:4',
          'reason' => 'required|max:500'
    		]);
        $requestData = $request->all();

        RelativeExchange::create($requestData);

        return redirect('student/relative-exchange')->with('flash_message', 'تم اضافةالصرف العيني');
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

        return view('student.relative-exchange.show', compact('relativeexchange'));
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
        $students = Student::all();

        return view('student.relative-exchange.edit', compact('relativeexchange' , 'students'));
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
          'student_id' => 'required',
          'amount' => 'required|regex:/^[0-9]+$/|max:4',
          'reason' => 'required|max:500'
    		]);
        $requestData = $request->all();

        $relativeexchange = RelativeExchange::findOrFail($id);
        $relativeexchange->update($requestData);

        return redirect('student/relative-exchange')->with('flash_message', 'تم تحديث الصرف العيني');
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

        return redirect('student/relative-exchange')->with('flash_message', 'تم حذف الصرف العيني');
    }
}
