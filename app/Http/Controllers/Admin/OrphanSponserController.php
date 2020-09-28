<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\OrphanSponser;
use Illuminate\Http\Request;

class OrphanSponserController extends Controller
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
            $orphansponser = OrphanSponser::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $orphansponser = OrphanSponser::latest()->paginate($perPage);
        }

        return view('admin.orphan-sponser.index', compact('orphansponser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.orphan-sponser.create');
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
    			'name' => 'required|min:8|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'required|regex:/(01)[0-9]{9}/|size:11|unique:orphan_sponsers,phone,NULL,id,deleted_at,NULL',
          'national_id' => 'required|size:14|unique:orphan_sponsers,national_id,NULL,id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        OrphanSponser::create($requestData);

        return redirect('admin/orphan-sponser')->with('flash_message', 'تم اضافة كافل اليتيم!');
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
        $orphansponser = OrphanSponser::findOrFail($id);

        return view('admin.orphan-sponser.show', compact('orphansponser'));
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
        $orphansponser = OrphanSponser::findOrFail($id);

        return view('admin.orphan-sponser.edit', compact('orphansponser'));
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
        $orphansponser = OrphanSponser::findOrFail($id);
        $this->validate($request, [
    			'name' => 'required|min:8|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'required|regex:/(01)[0-9]{9}/|size:11|unique:orphan_sponsers,phone,'.$orphansponser->id . ',id,deleted_at,NULL',
          'national_id' => 'required|size:14|unique:orphan_sponsers,national_id,'. $orphansponser->id . ',id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        $orphansponser->update($requestData);

        return redirect('admin/orphan-sponser')->with('flash_message', 'تم تحديث كافل اليتيم!');
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
        OrphanSponser::destroy($id);

        return redirect('admin/orphan-sponser')->with('flash_message', 'تم حذف كافل اليتيم!');
    }
}
