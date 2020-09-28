<?php

namespace App\Http\Controllers\Girls;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Girls\Girls;
use App\Girls\Purchase;
use Illuminate\Http\Request;
use Carbon\Carbon;

class GirlsController extends Controller
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
            $girls = Girls::where('name', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->orWhere('phone', 'LIKE', "%$keyword%")
                ->orWhere('birth_date', 'LIKE', "%$keyword%")
                ->orWhere('marriage_date', 'LIKE', "%$keyword%")
                ->orWhere('type', 'LIKE', "%$keyword%")
                ->orWhere('case', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $girls = Girls::latest()->paginate($perPage);
        }

        return view('girls-marriage.girls.index', compact('girls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('girls-marriage.girls.create');
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
    			'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'nullable|regex:/(01)[0-9]{9}/|size:11|unique:girls,phone,NULL,id,deleted_at,NULL',
          'national_id' => 'required|size:14|unique:girls,national_id,NULL,id,deleted_at,NULL',
          'birth_date' => 'required|date|before:' . $today ,
          'marriage_date' => 'required|date|after:' . $today ,
    		]);
        $requestData = $request->all();

        Girls::create($requestData);

        return redirect('girls-marriage/girls')->with('flash_message', 'تم اضافة بنت');
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
        $girl = Girls::findOrFail($id);
        $purchases = Purchase::where('girl_id',$id)->get();

        return view('girls-marriage.girls.show', compact('girl' , 'purchases'));
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
        $girl = Girls::findOrFail($id);

        return view('girls-marriage.girls.edit', compact('girl'));
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
        $today = Carbon::now()->format('Y-m-d');
        $this->validate($request, [
          'name' => 'required|min:2|max:30||regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'phone' => 'nullable|regex:/(01)[0-9]{9}/|size:11|unique:girls,phone,'. $id . ',id,deleted_at,NULL',
          'national_id' => 'required|size:14|unique:girls,national_id,'. $id . ',id,deleted_at,NULL',
          'birth_date' => 'required|date|before:' . $today ,
          'marriage_date' => 'required|date|after:' . $today ,
    		]);
        $requestData = $request->all();

        $girl = Girls::findOrFail($id);
        $girl->update($requestData);

        return redirect('girls-marriage/girls')->with('flash_message', 'تم تعديل البنت');
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
        Girls::destroy($id);
        Purchase::where('girl_id' , $id)->delete();

        return redirect('girls-marriage/girls')->with('flash_message', 'تم حذف البنت');
    }
}
