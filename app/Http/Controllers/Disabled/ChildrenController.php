<?php

namespace App\Http\Controllers\Disabled;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Disabled\Child;
use App\Disabled\FamilyDetail;
use App\Disabled\OrphanSponser;
use App\Disabled\Disabled;
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
                ->orWhereHas('family', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");})
                ->orWhereHas('orphanSponser', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");})
                ->latest()->paginate($perPage);
        } else {
            $children = Child::latest()->paginate($perPage);
        }

        return view('disabled.children.index', compact('children'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $families = FamilyDetail::all();
        $orphanSponsers = OrphanSponser::all();
        $disableds = Disabled::all();

        return view('disabled.children.create', compact('child' , 'families'  , 'orphanSponsers' , 'disableds'));
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
      // dd($request->all());
        $today = Carbon::now()->format('Y-m-d');
        $this->validate($request, [
    			'name' => 'required|min:2|max:30',
          'birth_date' => 'required|date|before:' . $today,
          'national_id' => 'required|size:14|unique:childrens,national_id,NULL,id,deleted_at,NULL',
          'academic_year' => 'required|min:1|max:30',
          'social_status' => 'required',
          'type' => 'required',
          'orphan_sponser_id' => 'required',
    		]);
        $requestData = $request->all();

        Child::create($requestData);

        return redirect('disabled/children')->with('flash_message', 'تم اضافة طفل!');
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
        $families = FamilyDetail::all();
        $orphanSponsers = OrphanSponser::all();

        return view('disabled.children.show', compact('child' , 'families'  , 'orphanSponsers'));
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
        $families = FamilyDetail::all();
        $orphanSponsers = OrphanSponser::all();
        $disableds = Disabled::all();

        return view('disabled.children.edit', compact('child' , 'families' , 'orphanSponsers' , 'disableds'));
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
          'national_id' => 'required|size:14|unique:childrens,national_id,'. $child->id . ',id,deleted_at,NULL',
          'academic_year' => 'required|min:1|max:30',
          'social_status' => 'required',
          'type' => 'required',
          'orphan_sponser_id' => 'required',
    		]);
        $requestData = $request->all();

        $child->update($requestData);

        return redirect('disabled/children')->with('flash_message', 'تم تحديث الطفل!');
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

        return redirect('disabled/children')->with('flash_message', 'تم حذف الطفل!');
    }
}
