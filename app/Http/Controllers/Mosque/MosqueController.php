<?php

namespace App\Http\Controllers\Mosque;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Mosque\Mosque;
use Illuminate\Http\Request;

class MosqueController extends Controller
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
            $mosque = Mosque::where('name', 'LIKE', "%$keyword%")
                ->orWhere('address', 'LIKE', "%$keyword%")
                ->orWhere('code', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $mosque = Mosque::latest()->paginate($perPage);
        }

        return view('mosque.mosque.index', compact('mosque'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('mosque.mosque.create');
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
    			'name' => 'required|min:3|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'address' => 'required|max:100',
          'code' => 'required|regex:/^[0-9]+$/|max:30|unique:mosques,code,NULL,id,deleted_at,NULL',
    		]);
        $requestData = $request->all();

        Mosque::create($requestData);

        return redirect('mosque/mosque')->with('flash_message', 'تم اضافة مسجد');
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
        $mosque = Mosque::findOrFail($id);

        return view('mosque.mosque.show', compact('mosque'));
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
        $mosque = Mosque::findOrFail($id);

        return view('mosque.mosque.edit', compact('mosque'));
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
    			'name' => 'required|min:3|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'address' => 'required|max:100',
          'code' => 'required|regex:/^[0-9]+$/|max:30|unique:mosques,code,'. $id . ',id,deleted_at,NULL'
    		]);
        $requestData = $request->all();

        $mosque = Mosque::findOrFail($id);
        $mosque->update($requestData);

        return redirect('mosque/mosque')->with('flash_message', 'تم تعديل المسجد');
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
        Mosque::destroy($id);

        return redirect('mosque/mosque')->with('flash_message', 'تم حذف المسجد');
    }
}
