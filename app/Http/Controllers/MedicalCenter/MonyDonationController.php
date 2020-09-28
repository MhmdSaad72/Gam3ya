<?php

namespace App\Http\Controllers\MedicalCenter;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\MedicalCenter\MonyDonation;
use Illuminate\Http\Request;

class MonyDonationController extends Controller
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
            $mony = MonyDonation::where('name', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mony = MonyDonation::latest()->paginate($perPage);
        }

        return view('medical-center.mony-donations.index', compact('mony'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('medical-center.mony-donations.create');
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
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'details' => 'nullable|min:3|max:500',
          'phone' => 'nullable|regex:/(01)[0-9]{9}/|size:11|unique:mony_donations,phone,NULL,id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        MonyDonation::create($requestData);

        return redirect('medical-center/money-donations')->with('flash_message', 'تم اضافة صرف مادي');
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
        $mony = MonyDonation::findOrFail($id);

        return view('medical-center.mony-donations.show', compact('mony'));
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
        $mony = MonyDonation::findOrFail($id);

        return view('medical-center.mony-donations.edit', compact('mony'));
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
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'details' => 'nullable|min:3|max:500',
          'phone' => 'nullable|regex:/(01)[0-9]{9}/|size:11|unique:mony_donations,phone,'. $id .',id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        $mony = MonyDonation::findOrFail($id);
        $mony->update($requestData);

        return redirect('medical-center/money-donations')->with('flash_message', 'تم تحديث الصرف المادي');
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
        MonyDonation::destroy($id);

        return redirect('medical-center/money-donations')->with('flash_message', 'تم حذف الصرف المادي');
    }
}
