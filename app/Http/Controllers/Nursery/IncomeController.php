<?php

namespace App\Http\Controllers\Nursery;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Nursery\NurseryAccounts;
use App\Nursery\NurseryDonations;
use Illuminate\Http\Request;
use Carbon\Carbon;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index_accounts(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $nursery_accounts = NurseryAccounts::where('amount', 'LIKE', "%$keyword%")
                ->orWhere('patient_name', 'LIKE', "%$keyword%")
                ->orWhere('doctor_name', 'LIKE', "%$keyword%")
                ->orWhere('date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $nursery_accounts = NurseryAccounts::latest()->paginate($perPage);
        }

        return view('nursery.nursery-accounts.index', compact('nursery_accounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create_accounts()
    {
        return view('nursery.nursery-accounts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_accounts(Request $request)
    {
        $date = Carbon::now()->subDay(1)->format('Y-m-d');
        $this->validate($request, [
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'patient_name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'doctor_name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'date' => 'nullable|date|after:' . $date ,
    		]);
        $requestData = $request->all();

        NurseryAccounts::create($requestData);

        return redirect('nursery/nursery-accounts')->with('flash_message', 'تم اضافة كشف');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show_accounts($id)
    {
        $nursery_accounts = NurseryAccounts::findOrFail($id);

        return view('nursery.nursery-accounts.show', compact('nursery_accounts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit_accounts($id)
    {
        $nursery_accounts = NurseryAccounts::findOrFail($id);

        return view('nursery.nursery-accounts.edit', compact('nursery_accounts'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update_accounts(Request $request, $id)
    {
        $date = Carbon::now()->subDay(1)->format('Y-m-d');
        $this->validate($request, [
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'patient_name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'doctor_name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'date' => 'nullable|date|after:' . $date ,
    		]);
        $requestData = $request->all();

        $nursery_accounts = NurseryAccounts::findOrFail($id);
        $nursery_accounts->update($requestData);

        return redirect('nursery/nursery-accounts')->with('flash_message', 'تم تعديل الكشف');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy_accounts($id)
    {
        NurseryAccounts::destroy($id);

        return redirect('nursery/nursery-accounts')->with('flash_message', 'تم حذف الكشف');
    }
    /******************************************************************************************************************
                                  All income donations functions
    *****************************************************************************************************************/
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index_donnations(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $nursery_donnations = NurseryDonations::where('amount', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $nursery_donnations = NurseryDonations::latest()->paginate($perPage);
        }

        return view('nursery.nursery-donnations.index', compact('nursery_donnations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create_donnations()
    {
        return view('nursery.nursery-donnations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store_donnations(Request $request)
    {
        $this->validate($request, [
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'required|regex:/(01)[0-9]{9}/|size:11|unique:nursery_donations,phone,NULL,id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        NurseryDonations::create($requestData);

        return redirect('nursery/nursery-donnations')->with('flash_message', 'تم اضافة تبرع');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show_donnations($id)
    {
        $nursery_donnations = NurseryDonations::findOrFail($id);

        return view('nursery.nursery-donnations.show', compact('nursery_donnations'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit_donnations($id)
    {
        $nursery_donnations = NurseryDonations::findOrFail($id);

        return view('nursery.nursery-donnations.edit', compact('nursery_donnations'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update_donnations(Request $request, $id)
    {
        $this->validate($request, [
          'amount' => 'required|regex:/^[0-9]+$/|max:6',
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'required|regex:/(01)[0-9]{9}/|size:11|unique:nursery_donations,phone,'. $id .',id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        $nursery_donnations = NurseryDonations::findOrFail($id);
        $nursery_donnations->update($requestData);

        return redirect('nursery/nursery-donnations')->with('flash_message', 'تم تعديل التبرع');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy_donnations($id)
    {
        NurseryDonations::destroy($id);

        return redirect('nursery/nursery-donnations')->with('flash_message', 'تم حذف التبرع');
    }
}
