<?php

namespace App\Http\Controllers\Nursery;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Nursery\NurserySalary;
use App\Nursery\NurseryExpenses;
use Illuminate\Http\Request;

class OutcomeController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\View\View
   */
  public function index_salaries(Request $request)
  {
      $keyword = $request->get('search');
      $perPage = 10;

      if (!empty($keyword)) {
          $nursery_salaries = NurserySalary::where('amount', 'LIKE', "%$keyword%")
              ->orWhere('name', 'LIKE', "%$keyword%")
              ->orWhere('details', 'LIKE', "%$keyword%")
              ->latest()->paginate($perPage);
      } else {
          $nursery_salaries = NurserySalary::latest()->paginate($perPage);
      }

      return view('nursery.nursery-salaries.index', compact('nursery_salaries'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\View\View
   */
  public function create_salaries()
  {
      return view('nursery.nursery-salaries.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store_salaries(Request $request)
  {
      $this->validate($request, [
        'amount' => 'required|regex:/^[0-9]+$/|max:6',
        'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
        'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
      ]);
      $requestData = $request->all();

      NurserySalary::create($requestData);

      return redirect('nursery/nursery-salaries')->with('flash_message', 'تم اضافة راتب');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\View\View
   */
  public function show_salaries($id)
  {
      $nursery_salaries = NurserySalary::findOrFail($id);

      return view('nursery.nursery-salaries.show', compact('nursery_salaries'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\View\View
   */
  public function edit_salaries($id)
  {
      $nursery_salaries = NurserySalary::findOrFail($id);

      return view('nursery.nursery-salaries.edit', compact('nursery_salaries'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param  int  $id
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update_salaries(Request $request, $id)
  {
      $this->validate($request, [
        'amount' => 'required|regex:/^[0-9]+$/|max:6',
        'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
        'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
      ]);
      $requestData = $request->all();

      $nursery_salaries = NurserySalary::findOrFail($id);
      $nursery_salaries->update($requestData);

      return redirect('nursery/nursery-salaries')->with('flash_message', 'تم تعديل الراتب');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function destroy_salaries($id)
  {
      NurserySalary::destroy($id);

      return redirect('nursery/nursery-salaries')->with('flash_message', 'تم حذف الراتب');
  }
  /******************************************************************************************************************
                                All Outcome Expenses functions
  *****************************************************************************************************************/
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\View\View
   */
  public function index_expenses(Request $request)
  {
      $keyword = $request->get('search');
      $perPage = 10;

      if (!empty($keyword)) {
          $nursery_expenses = NurseryExpenses::where('amount', 'LIKE', "%$keyword%")
              ->orWhere('name', 'LIKE', "%$keyword%")
              ->orWhere('details', 'LIKE', "%$keyword%")
              ->latest()->paginate($perPage);
      } else {
          $nursery_expenses = NurseryExpenses::latest()->paginate($perPage);
      }

      return view('nursery.nursery-expenses.index', compact('nursery_expenses'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\View\View
   */
  public function create_expenses()
  {
      return view('nursery.nursery-expenses.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function store_expenses(Request $request)
  {
      $this->validate($request, [
        'amount' => 'required|regex:/^[0-9]+$/|max:6',
        'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
        'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
      ]);
      $requestData = $request->all();

      NurseryExpenses::create($requestData);

      return redirect('nursery/nursery-expenses')->with('flash_message', 'تم اضافة منصرف');
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\View\View
   */
  public function show_expenses($id)
  {
      $nursery_expenses = NurseryExpenses::findOrFail($id);

      return view('nursery.nursery-expenses.show', compact('nursery_expenses'));
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   *
   * @return \Illuminate\View\View
   */
  public function edit_expenses($id)
  {
      $nursery_expenses = NurseryExpenses::findOrFail($id);

      return view('nursery.nursery-expenses.edit', compact('nursery_expenses'));
  }

  /**
   * Update the specified resource in storage.
   *
   * @param \Illuminate\Http\Request $request
   * @param  int  $id
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function update_expenses(Request $request, $id)
  {
      $this->validate($request, [
        'amount' => 'required|regex:/^[0-9]+$/|max:6',
        'name' => 'required|min:2|max:30|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
        'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
      ]);
      $requestData = $request->all();

      $nursery_expenses = NurseryExpenses::findOrFail($id);
      $nursery_expenses->update($requestData);

      return redirect('nursery/nursery-expenses')->with('flash_message', 'تم تعديل المنصرف');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   *
   * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function destroy_expenses($id)
  {
      NurseryExpenses::destroy($id);

      return redirect('nursery/nursery-expenses')->with('flash_message', 'تم حذف المنصرف');
  }
}
