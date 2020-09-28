<?php

namespace App\Http\Controllers\Mosque;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mosque\Worker;
use App\Mosque\Mosque;
use Illuminate\Http\Request;

class WorkerController extends Controller
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
            $worker = Worker::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('job', 'LIKE', "%$keyword%")
                ->orWhere('salary', 'LIKE', "%$keyword%")
                ->orWhereHas('mosque', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");})
                ->latest()->paginate($perPage);
        } else {
            $worker = Worker::latest()->paginate($perPage);
        }

        return view('mosque.worker.index', compact('worker'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $mosques = Mosque::all();
        return view('mosque.worker.create' , compact('mosques'));
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
    			'name' => 'required|min:3|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'phone' => 'required||regex:/(01)[0-9]{9}/|size:11|unique:workers,phone,NULL,id,deleted_at,NULL',
          'job' => 'nullable|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'salary' => 'nullable|regex:/^[0-9]+$/|max:4',
          'mosque_id' => 'required',
    		]);
        $requestData = $request->all();

        Worker::create($requestData);

        return redirect('mosque/worker')->with('flash_message', 'تم اضافة عامل');
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
        $worker = Worker::findOrFail($id);

        return view('mosque.worker.show', compact('worker'));
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
        $worker = Worker::findOrFail($id);
        $mosques = Mosque::all();

        return view('mosque.worker.edit', compact('worker' , 'mosques'));
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
          'name' => 'required|min:3|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'phone' => 'required|regex:/(01)[0-9]{9}/|size:11|unique:workers,phone,'. $id . ',id,deleted_at,NULL',
          'job' => 'nullable|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'salary' => 'nullable|regex:/^[0-9]+$/|max:4',
          'mosque_id' => 'required',
    		]);
        $requestData = $request->all();

        $worker = Worker::findOrFail($id);
        $worker->update($requestData);

        return redirect('mosque/worker')->with('flash_message', 'تم تعديل العامل');
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
        Worker::destroy($id);

        return redirect('mosque/worker')->with('flash_message', 'تم حذف العامل');
    }
}
