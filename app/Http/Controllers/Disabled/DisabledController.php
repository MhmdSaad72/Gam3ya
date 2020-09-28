<?php

namespace App\Http\Controllers\Disabled;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Disabled\Disabled;
use Illuminate\Http\Request;

class DisabledController extends Controller
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
            $disabled = Disabled::where('name', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $disabled = Disabled::latest()->paginate($perPage);
        }

        return view('disabled.disabled.index', compact('disabled'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('disabled.disabled.create');
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
    			'name' => 'required|min:2|max:30'
    		]);
        $requestData = $request->all();

        Disabled::create($requestData);

        return redirect('disabled/disabled')->with('flash_message', 'تم اضافة الاعاقة');
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
      abort(404);
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
        $disabled = Disabled::findOrFail($id);

        return view('disabled.disabled.edit', compact('disabled'));
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
    			'name' => 'required|min:2|max:30'
    		]);
        $requestData = $request->all();

        $disabled = Disabled::findOrFail($id);
        $disabled->update($requestData);

        return redirect('disabled/disabled')->with('flash_message', 'تم تعديل الاعاقة');
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
        Disabled::destroy($id);

        return redirect('disabled/disabled')->with('flash_message', 'تم حذف الاعاقة');
    }
}
