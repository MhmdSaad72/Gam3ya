<?php

namespace App\Http\Controllers\MedicalCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MedicalCenter\Device;
use Illuminate\Http\Request;

class DeviceController extends Controller
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
            $device = Device::where('place', 'LIKE', "%$keyword%")
                ->orWhere('person', 'LIKE', "%$keyword%")
                ->orWhere('entry_date', 'LIKE', "%$keyword%")
                ->orWhere('exit_date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $device = Device::latest()->paginate($perPage);
        }

        return view('medical-center.device.index', compact('device'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('medical-center.device.create');
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
          'place' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'person' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'entry_date' => 'required|date',
          'exit_date' => 'required|date|after:' . $request->entry_date,
    		]);
        $requestData = $request->all();

        Device::create($requestData);

        return redirect('medical-center/device')->with('flash_message', 'تم اضافة جهاز');
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
        $device = Device::findOrFail($id);

        return view('medical-center.device.show', compact('device'));
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
        $device = Device::findOrFail($id);

        return view('medical-center.device.edit', compact('device'));
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
          'place' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'person' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'entry_date' => 'required|date',
          'exit_date' => 'required|date|after:' . $request->entry_date,
    		]);
        $requestData = $request->all();

        $device = Device::findOrFail($id);
        $device->update($requestData);

        return redirect('medical-center/device')->with('flash_message', 'تم تحديث الجهاز');
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
        Device::destroy($id);

        return redirect('medical-center/device')->with('flash_message', 'تم حذف الجهاز');
    }
}
