<?php

namespace App\Http\Controllers\Poor;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Poor\Basic;
use Illuminate\Http\Request;

class BasicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $basic = Basic::first();
        return view('poor-people.basic.index', compact('basic'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('poor-people.basic.create');
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
    			'addetion' => 'required',
    			'guarantee' => 'required'
    		]);
        $requestData = $request->all();

        Basic::create($requestData);

        return redirect('poor-people/basic')->with('flash_message', 'تم اضافة اﻷساسيات!');
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
        $basic = Basic::findOrFail($id);

        return view('poor-people.basic.show', compact('basic'));
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
        $basic = Basic::findOrFail($id);

        return view('poor-people.basic.edit', compact('basic'));
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
    			'addetion' => 'required|max:4|regex:/^[0-9]+$/',
    			'guarantee' => 'required|max:4|regex:/^[0-9]+$/'
    		]);
        $requestData = $request->all();

        $basic = Basic::findOrFail($id);
        $basic->update($requestData);

        return redirect('poor-people/basic')->with('flash_message', 'تم تحديث اﻷساسيات!');
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
        Basic::destroy($id);

        return redirect('poor-people/basic')->with('flash_message', 'تم حذف اﻷساسيات!');
    }
}
