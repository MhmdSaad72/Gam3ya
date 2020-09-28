<?php

namespace App\Http\Controllers\Mosque;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mosque\Cost;
use App\Mosque\Mosque;
use Illuminate\Http\Request;

class CostController extends Controller
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
            $cost = Cost::where('price', 'LIKE', "%$keyword%")
                ->orWhereHas('mosque', function ($query) use ($keyword) {
                  $query->where('name', 'LIKE', "%$keyword%");})
                ->latest()->paginate($perPage);
        } else {
            $cost = Cost::latest()->paginate($perPage);
        }

        return view('mosque.cost.index', compact('cost'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $mosques = Mosque::all();
        return view('mosque.cost.create' , compact('mosques'));
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
    			'price' => 'required|regex:/^[0-9]+$/|max:4',
          'mosque_id' => 'required'
    		]);
        $requestData = $request->all();

        Cost::create($requestData);

        return redirect('mosque/cost')->with('flash_message', 'تم اضافة حساب منصرف');
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
        $cost = Cost::findOrFail($id);

        return view('mosque.cost.show', compact('cost'));
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
        $cost = Cost::findOrFail($id);
        $mosques = Mosque::all();

        return view('mosque.cost.edit', compact('cost' , 'mosques'));
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
          'price' => 'required|regex:/^[0-9]+$/|max:4',
          'mosque_id' => 'required'
    		]);
        $requestData = $request->all();

        $cost = Cost::findOrFail($id);
        $cost->update($requestData);

        return redirect('mosque/cost')->with('flash_message', 'تم تعديل الحساب المنصرف');
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
        Cost::destroy($id);

        return redirect('mosque/cost')->with('flash_message', 'تم حذف الحساب المنصرف');
    }
}
