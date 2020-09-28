<?php

namespace App\Http\Controllers\Mosque;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mosque\Incoming;
use App\Mosque\Mosque;
use Illuminate\Http\Request;

class IncomingController extends Controller
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
            $incoming = Incoming::where('price', 'LIKE', "%$keyword%")
                ->orWhereHas('mosque', function ($query) use ($keyword) {
                  $query->where('name', 'LIKE', "%$keyword%");})
                ->latest()->paginate($perPage);
        } else {
            $incoming = Incoming::latest()->paginate($perPage);
        }

        return view('mosque.incoming.index', compact('incoming'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $mosques = Mosque::all();
        return view('mosque.incoming.create' , compact('mosques'));
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

        Incoming::create($requestData);

        return redirect('mosque/incoming')->with('flash_message', 'تم اضافة حساب وارد');
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
        $incoming = Incoming::findOrFail($id);

        return view('mosque.incoming.show', compact('incoming'));
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
        $incoming = Incoming::findOrFail($id);
        $mosques = Mosque::all();

        return view('mosque.incoming.edit', compact('incoming' , 'mosques'));
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

        $incoming = Incoming::findOrFail($id);
        $incoming->update($requestData);

        return redirect('mosque/incoming')->with('flash_message', 'تم تعديل الحساب الوارد');
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
        Incoming::destroy($id);

        return redirect('mosque/incoming')->with('flash_message', 'تم حذف الحساب الوارد');
    }
}
