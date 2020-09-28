<?php

namespace App\Http\Controllers\MedicalCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MedicalCenter\DeviceDonation;
use Illuminate\Http\Request;

class DeviceDonationController extends Controller
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
            $devices = DeviceDonation::where('name', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $devices = DeviceDonation::latest()->paginate($perPage);
        }

        return view('medical-center.devices-donations.index', compact('devices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('medical-center.devices-donations.create');
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
          'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    		]);
        $requestData = $request->all();

        DeviceDonation::create($requestData);

        return redirect('medical-center/devices-donations')->with('flash_message', 'تم اضافة جهاز');
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
        $device = DeviceDonation::findOrFail($id);

        return view('medical-center.devices-donations.show', compact('device'));
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
        $device = DeviceDonation::findOrFail($id);

        return view('medical-center.devices-donations.edit', compact('device'));
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
          'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    		]);
        $requestData = $request->all();

        $device = DeviceDonation::findOrFail($id);
        $device->update($requestData);

        return redirect('medical-center/devices-donations')->with('flash_message', 'تم تحديث الجهاز');
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
        DeviceDonation::destroy($id);

        return redirect('medical-center/devices-donations')->with('flash_message', 'تم حذف الجهاز');
    }
}
