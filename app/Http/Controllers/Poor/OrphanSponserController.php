<?php

namespace App\Http\Controllers\Poor;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Poor\OrphanSponser;
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
                ->latest()->paginate($perPage);
        } else {
            $orphansponser = OrphanSponser::latest()->paginate($perPage);
        }

        return view('poor-people.orphan-sponser.index', compact('orphansponser'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('poor-people.orphan-sponser.create');
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
    			'name' => 'required',
          'phone' => 'required|min:11|unique:orphan_sponsers,phone,NULL,id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        OrphanSponser::create($requestData);

        return redirect('poor-people/orphan-sponser')->with('flash_message', 'تم اضافة كافل!');
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

        return view('poor-people.orphan-sponser.show', compact('orphansponser'));
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

        return view('poor-people.orphan-sponser.edit', compact('orphansponser'));
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
    			'name' => 'required',
          'phone' => 'required|min:11|unique:orphan_sponsers,phone,'.$orphansponser->id . ',id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        $orphansponser->update($requestData);

        return redirect('poor-people/orphan-sponser')->with('flash_message', 'تم تحديث الكافل!');
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

        return redirect('poor-people/orphan-sponser')->with('flash_message', 'تم حذف الكافل!');
    }
}
