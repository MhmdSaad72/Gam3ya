<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Table\Outcome;
use Illuminate\Http\Request;

class OutcomeController extends Controller
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
            $outcome = Outcome::where('amount', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $outcome = Outcome::latest()->paginate($perPage);
        }

        return view('table.outcome.index', compact('outcome'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('table.outcome.create');
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
          'amount' => 'required|regex:/^[0-9]+$/|max:4',
          'name' => 'nullable|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'national_id' => 'nullable|size:14',
    		]);
        $requestData = $request->all();

        Outcome::create($requestData);

        return redirect('table/outcome')->with('flash_message', 'تم اضافةمنصرف');
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
        $outcome = Outcome::findOrFail($id);

        return view('table.outcome.show', compact('outcome'));
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
        $outcome = Outcome::findOrFail($id);

        return view('table.outcome.edit', compact('outcome'));
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
          'amount' => 'required|regex:/^[0-9]+$/|max:4',
          'name' => 'nullable|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'national_id' => 'nullable|size:14',
    		]);
        $requestData = $request->all();

        $outcome = Outcome::findOrFail($id);
        $outcome->update($requestData);

        return redirect('table/outcome')->with('flash_message', 'تم تحديث منصرف');
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
        Outcome::destroy($id);

        return redirect('table/outcome')->with('flash_message', 'تم حذف منصرف');
    }
}
