<?php

namespace App\Http\Controllers\Nursery;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Nursery\Child;
use \Carbon\Carbon ;
use Illuminate\Http\Request;

class ChildrenController extends Controller
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
            $children = Child::where('name', 'LIKE', "%$keyword%")
                ->orWhere('birth_date', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('created_at', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $children = Child::latest()->paginate($perPage);
        }

        return view('nursery.children.index', compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {

        return view('nursery.children.create', compact('child'));
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
        $today = Carbon::now()->format('Y-m-d');
        $this->validate($request, [
    			'name' => 'required|min:2|max:30',
          'birth_date' => 'required|date|before:' . $today,
          'national_id' => 'required|size:14|unique:nurseyr_childrens,national_id,NULL,id,deleted_at,NULL',
          'academic_year' => 'required|min:1|max:30',
          'social_status' => 'required',
          'type' => 'required',
    		]);
        $requestData = $request->all();

        Child::create($requestData);

        return redirect('nursery/children')->with('flash_message', 'تم اضافة طفل!');
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
        $child = Child::findOrFail($id);
        return view('nursery.children.show', compact('child'));
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
        $child = Child::findOrFail($id);

        return view('nursery.children.edit', compact('child'));
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
        $child = Child::findOrFail($id);
        $today = Carbon::now()->format('Y-m-d');
        $this->validate($request, [
          'name' => 'required|min:2|max:30',
          'birth_date' => 'required|date|before:' . $today,
          'national_id' => 'required|size:14|unique:nurseyr_childrens,national_id,'. $child->id . ',id,deleted_at,NULL',
          'academic_year' => 'required|min:1|max:30',
          'social_status' => 'required',
          'type' => 'required',
    		]);
        $requestData = $request->all();

        $child->update($requestData);

        return redirect('nursery/children')->with('flash_message', 'تم تحديث الطفل!');
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
        Child::destroy($id);

        return redirect('nursery/children')->with('flash_message', 'تم حذف الطفل!');
    }
}
