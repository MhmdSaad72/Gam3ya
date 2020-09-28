<?php

namespace App\Http\Controllers\Table;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Table\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
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
            $income = Income::where('amount', 'LIKE', "%$keyword%")
                ->orWhere('name', 'LIKE', "%$keyword%")
                ->orWhere('national_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $income = Income::latest()->paginate($perPage);
        }

        return view('table.income.index', compact('income'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('table.income.create');
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

        Income::create($requestData);

        return redirect('table/income')->with('flash_message', 'تم اضافة وارد');
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
        $income = Income::findOrFail($id);

        return view('table.income.show', compact('income'));
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
        $income = Income::findOrFail($id);

        return view('table.income.edit', compact('income'));
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

        $income = Income::findOrFail($id);
        $income->update($requestData);

        return redirect('table/income')->with('flash_message', 'تم تحديث الوارد');
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
        Income::destroy($id);

        return redirect('table/income')->with('flash_message', 'تم حذف الوارد');
    }
}
