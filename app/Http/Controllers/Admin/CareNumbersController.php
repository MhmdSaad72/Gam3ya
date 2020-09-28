<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\FamilyDetail;
use App\Child;
use App\MonthlyExchange;
use App\RelativeExchange;
use Intervention\Image\Facades\Image;
use App\Poor\FamilyDetail as PoorFamilyDetail;
use App\Poor\Child as PoorChild;
use App\Poor\MonthlyExchange as PoorMonthlyExchange;
use App\Poor\RelativeExchange as PoorRelativeExchange;


class CareNumbersController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $families = FamilyDetail::where('care_number', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $families = FamilyDetail::select('id','care_number')->latest()->paginate($perPage);
        }

        return view('admin.care-numbers.index' , compact('families'));
    }

    public function show($id)
    {
       $familydetail = FamilyDetail::findOrFail($id);
       $children = Child::where('family_id' , $id)->get();
       $monthlyExchange = MonthlyExchange::all();
       $relativEexchange = RelativeExchange::where('category_id' , $familydetail->category_id)->get();
       return view('admin.care-numbers.show' , compact('familydetail' , 'children' , 'monthlyExchange' , 'relativEexchange'));
    }

    public function poorIndex(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 10;

        if (!empty($keyword)) {
            $families = PoorFamilyDetail::where('care_number', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $families = PoorFamilyDetail::select('id','care_number')->latest()->paginate($perPage);
        }

        return view('poor-people.care-numbers.index' , compact('families'));
    }

    public function poorShow($id)
    {
       $familydetail = PoorFamilyDetail::findOrFail($id);
       $children = PoorChild::where('family_id' , $id)->get();
       $monthlyExchange = PoorMonthlyExchange::all();
       $relativEexchange = PoorRelativeExchange::where('category_id' , $familydetail->category_id)->get();
       return view('poor-people.care-numbers.show' , compact('familydetail' , 'children' , 'monthlyExchange' , 'relativEexchange'));
    }

    public function makeImage($id)
    {
      $family = FamilyDetail::findOrFail($id);
      return view('admin.barcode', compact('family'));
    }

    public function makeImage2($id)
    {
      $family = PoorFamilyDetail::findOrFail($id);
      return view('poor-people.barcode', compact('family'));
    }

}
