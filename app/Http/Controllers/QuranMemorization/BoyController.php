<?php

namespace App\Http\Controllers\QuranMemorization;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\QuranMemorization\Boy;
use App\QuranMemorization\Teacher;
use Illuminate\Http\Request;

class BoyController extends Controller
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
            $boy = Boy::where('name', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('details', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $boy = Boy::latest()->paginate($perPage);
        }

        return view('quran-memorization.boy.index', compact('boy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $teachers = Teacher::all();
        return view('quran-memorization.boy.create' , compact('teachers'));
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
    			'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'required||regex:/(01)[0-9]{9}/|size:11',
          'details' => 'nullable|max:500',
    		]);
        $requestData = $request->all();

        Boy::create($requestData);

        return redirect('quran-memorization/boy')->with('flash_message', 'تم اضافة الولد');
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
        $boy = Boy::findOrFail($id);

        return view('quran-memorization.boy.show', compact('boy'));
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
        $boy = Boy::findOrFail($id);
        $teachers = Teacher::all();

        return view('quran-memorization.boy.edit', compact('boy' , 'teachers'));
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
          'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'required||regex:/(01)[0-9]{9}/|size:11',
          'details' => 'nullable|max:500',
    		]);
        $requestData = $request->all();

        $boy = Boy::findOrFail($id);
        $boy->update($requestData);

        return redirect('quran-memorization/boy')->with('flash_message', 'تم تحديث الولد');
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
        Boy::destroy($id);

        return redirect('quran-memorization/boy')->with('flash_message', 'تم حذف الولد');
    }
}
