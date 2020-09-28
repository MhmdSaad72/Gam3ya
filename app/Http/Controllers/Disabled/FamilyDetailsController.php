<?php

namespace App\Http\Controllers\Disabled;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Disabled\FamilyDetail;
use App\Disabled\Category;
use DB;
use Illuminate\Http\Request;

class FamilyDetailsController extends Controller
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
            $familydetails = FamilyDetail::where('address', 'LIKE', "%$keyword%")
                ->orWhere('father_name', 'LIKE', "%$keyword%")
                ->orWhere('host_name', 'LIKE', "%$keyword%")
                ->orWhereHas('category', function ($query) use ($keyword) {
                $query->where('name', 'LIKE', "%$keyword%");})
                ->latest()->paginate($perPage);
        } else {
            $familydetails = FamilyDetail::latest()->paginate($perPage);
        }

        return view('disabled.family-details.index', compact('familydetails'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        return view('disabled.family-details.create' , compact('categories'));
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
          // 'name' => 'required',
    			'address' => 'nullable|min:3|max:255',
          'phone' => 'nullable|regex:/(01)[0-9]{9}/|size:11|unique:disabled_family_details,phone,NULL,id,deleted_at,NULL',
          // 'phone' => 'sometimes|min:11',
          'care_number' => 'required|unique:disabled_family_details,care_number,NULL,id,deleted_at,NULL|regex:/^[0-9]+$/||min:1|max:30',
          'serial_number' => 'nullable|unique:disabled_family_details,serial_number,NULL,id,deleted_at,NULL|regex:/^[0-9]+$/|max:30',
          'father_name' => 'nullable|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
    			'father_national_id' => 'nullable|size:14|unique:disabled_family_details,father_national_id,NULL,id,deleted_at,NULL',
          'host_name' => 'required|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
          'host_image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'host_national_id' => 'nullable|size:14|unique:disabled_family_details,host_national_id,NULL,id,deleted_at,NULL',
          'host_relationship' => 'nullable|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
          // 'category_id' => 'required',
    		]);
        $requestData = $request->all();
        if ($request->hasFile('host_image')) {
            $requestData['host_image'] = $request->file('host_image')
                                            ->store('uploads', 'public');
        }

        FamilyDetail::create($requestData);

        return redirect('disabled/family-details')->with('flash_message', 'تم اضافة عائلة!');
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
        $familydetail = FamilyDetail::findOrFail($id);
        return view('disabled.family-details.show', compact('familydetail'));
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
        $familydetail = FamilyDetail::findOrFail($id);
        $categories = Category::all();

        return view('disabled.family-details.edit', compact('familydetail' , 'categories'));
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
        $familydetail = FamilyDetail::findOrFail($id);
        $this->validate($request, [
          // 'name' => 'required',
    			'address' => 'nullable|min:2|max:255',
          'phone' => 'nullable|regex:/(01)[0-9]{9}/|size:11|unique:disabled_family_details,phone,'.$familydetail->id . ',id,deleted_at,NULL',
          'care_number' => 'required|unique:disabled_family_details,care_number,'.$familydetail->id . ',id,deleted_at,NULL|regex:/^[0-9]+$/|min:1|max:30',
          'serial_number' => 'nullable|unique:disabled_family_details,serial_number,'.$familydetail->id . ',id,deleted_at,NULL|regex:/^[0-9]+$/|max:30',
          'father_name' => 'nullable|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
    			'father_national_id' => 'nullable|size:14|unique:disabled_family_details,father_national_id,'.$familydetail->id . ',id,deleted_at,NULL',
          'host_name' => 'required|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
          'host_image' => 'file|image|mimes:jpeg,png,jpg,gif,svg',
          'host_national_id' => 'nullable|size:14|unique:disabled_family_details,host_national_id,'.$familydetail->id . ',id,deleted_at,NULL',
          'host_relationship' => 'nullable|regex:/^[a-zA-Z-ء-ي-\pL\s\-]+$/u|min:2|max:30',
          // 'category_id' => 'required',
    		]);
        $requestData = $request->all();
        if ($request->hasFile('host_image')) {
            $requestData['host_image'] = $request->file('host_image')
                                            ->store('uploads', 'public');
        }

        $familydetail->update($requestData);

        return redirect('disabled/family-details')->with('flash_message', 'تم تحديث العائلة!');
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
        FamilyDetail::destroy($id);

        return redirect('disabled/family-details')->with('flash_message', 'تم حذف العائلة!');
    }

    public function familyMonthChecked(Request $request , $id)
    {
      $family = FamilyDetail::findOrFail($id);
      $monthChecked = DB::table('disabled_month_costs')->insert([
        'checked' => 1 ,
        'family_id' => $id ,
        'monthly_id' => $request->monthly_id,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
      ]);
      return redirect()->back();
    }

    public function familyRelativeChecked(Request $request , $id)
    {
      $family = FamilyDetail::findOrFail($id);
      $relativeChecked = DB::table('disabled_relative_costs')->insert([
        'checked' => 1 ,
        'family_id' => $id ,
        'relative_id' => $request->relative_id,
        'created_at' => \Carbon\Carbon::now(),
        'updated_at' => \Carbon\Carbon::now(),
      ]);
      return redirect()->back();
    }
}
