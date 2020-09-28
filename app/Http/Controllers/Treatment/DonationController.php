<?php

namespace App\Http\Controllers\Treatment;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Treatment\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
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
            $donation = Donation::where('name', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->orWhere('amount', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $donation = Donation::latest()->paginate($perPage);
        }

        return view('treatment.donation.index', compact('donation'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('treatment.donation.create');
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
    			'name' => 'nullable|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
    			'national_id' => 'nullable|size:14|unique:donations,national_id,NULL,id,deleted_at,NULL',
    			'amount' => 'required|regex:/^[0-9]+$/|max:6',
    		]);
        $requestData = $request->all();

        Donation::create($requestData);

        return redirect('treatment/donation')->with('flash_message', 'تم اضافة تبرع');
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
        $donation = Donation::findOrFail($id);

        return view('treatment.donation.show', compact('donation'));
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
        $donation = Donation::findOrFail($id);

        return view('treatment.donation.edit', compact('donation'));
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
          'name' => 'nullable|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
    			'national_id' => 'nullable|size:14|unique:donations,national_id,'. $id .',id,deleted_at,NULL',
    			'amount' => 'required|regex:/^[0-9]+$/|max:6',
    		]);
        $requestData = $request->all();

        $donation = Donation::findOrFail($id);
        $donation->update($requestData);

        return redirect('treatment/donation')->with('flash_message', 'تم تعديل التبرع');
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
        Donation::destroy($id);

        return redirect('treatment/donation')->with('flash_message', 'تم حذف التبرع');
    }
}
