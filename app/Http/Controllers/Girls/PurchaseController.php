<?php

namespace App\Http\Controllers\Girls;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Girls\Purchase;
use App\Girls\Girls;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create($id)
    {
        $girl = Girls::findOrFail($id);
        return view('girls-marriage.purchase.create' , compact('girl'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request , $id)
    {
        $girl = Girls::findOrFail($id);
        $error = [
          'price.required' => 'حقل السعر مطلوب',
          'price.regex' => 'السعر غير صالح',
          'price.min' => 'يجب ألا يقل السعر عن  :min رقم',
          'price.max' => 'يجب ألا يزيد السعر عن :max أرقام',
        ];
        $this->validate($request, [
    			'name' => 'required|min:3|max:50|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'type' => 'nullable|min:3|max:50|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'price' => ['required' , 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/','min:1','max:6'] ,
          'code' => 'required|regex:/^[0-9]+$/|max:30|unique:purchases,code,NULL,id,deleted_at,NULL',
    		] , $error);
        $requestData = $request->all();
        $requestData['girl_id'] = $girl->id;

        Purchase::create($requestData);

        return redirect('girls-marriage/girls')->with('flash_message', 'تم اضافةمشتريات');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show(Request $request,$id)
    {
      $keyword = $request->get('search');
      $perPage = 10;

      $girl = Girls::findOrFail($id);

      if (!empty($keyword)) {
          $purchases = Purchase::where('girl_id' , $id)
              ->where(function($query) use ($keyword){
                $query->where('name', 'LIKE', "%$keyword%")
                  ->orWhere('type', 'LIKE', "%$keyword%")
                  ->orWhere('price', 'LIKE', "%$keyword%")
                  ->orWhere('code', 'LIKE', "%$keyword%")
                  ->orWhere('details', 'LIKE', "%$keyword%");
              })
              ->latest()->paginate($perPage);
      } else {
          $purchases = Purchase::where('girl_id' , $id)->latest()->paginate($perPage);
      }
      return view('girls-marriage.purchase.show', compact('purchases' , 'girl'));
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
        $purchase = Purchase::findOrFail($id);

        return view('girls-marriage.purchase.edit', compact('purchase'));
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
        $error = [
          'price.required' => 'حقل السعر مطلوب',
          'price.regex' => 'السعر غير صالح',
          'price.min' => 'يجب ألا يقل السعر عن  :min رقم',
          'price.max' => 'يجب ألا يزيد السعر عن :max أرقام',
        ];
        $this->validate($request, [
          'name' => 'required|min:3|max:50|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'type' => 'nullable|min:3|max:50|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
    			'details' => 'nullable|min:3|max:500|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u',
          'price' => ['required' , 'regex:/^(?=.+)(?:[1-9]\d*|0)?(?:\.\d+)?$/','min:1','max:6'] ,
          'code' => 'required|regex:/^[0-9]+$/|max:30|unique:purchases,code,'. $id . ',id,deleted_at,NULL',
    		] , $error);
        $requestData = $request->all();

        $purchase = Purchase::findOrFail($id);
        $purchase->update($requestData);

        return redirect('girls-marriage/girls')->with('flash_message', 'تم تعديل المشتريات');
    }
}
