<?php

namespace App\Http\Controllers\Disabled;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Disabled\FamilyDetail;
use App\Disabled\Child;
use App\Disabled\MonthlyExchange;
use App\Disabled\RelativeExchange;
use Intervention\Image\Facades\Image;


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

        return view('disabled.care-numbers.index' , compact('families'));
    }

    public function show($id)
    {
       $familydetail = FamilyDetail::findOrFail($id);
       $children = Child::where('family_id' , $id)->get();
       $monthlyExchange = MonthlyExchange::all();
       $relativEexchange = RelativeExchange::where('category_id' , $familydetail->category_id)->get();
       return view('disabled.care-numbers.show' , compact('familydetail' , 'children' , 'monthlyExchange' , 'relativEexchange'));
    }

    public function makeImage($id)
    {
      $family = FamilyDetail::findOrFail($id);
      return view('disabled.barcode', compact('family'));
    }

}
