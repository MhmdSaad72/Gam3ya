<?php

namespace App\Http\Controllers\Poor;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Poor\Child;
use Illuminate\Http\Request;

class ChildrenReportsController extends Controller
{
    public function males(Request $request)
    {
      $keyword = $request->get('search');
      $perPage = 10;
      $now = \Carbon\Carbon::now()->subYears(16)->format('Y-m-d');

      if (!empty($keyword)) {
          $children = Child::where('birth_date' , '<' , $now)
          ->where('type' , 0)
          ->where(function($query) use ($keyword){
              $query->where('name', 'LIKE', "%$keyword%")
              ->orWhere('birth_date', 'LIKE', "%$keyword%")
              ->orWhereHas('family', function ($query) use ($keyword) {
              $query->where('name', 'LIKE', "%$keyword%");})
              ->orWhereHas('orphanSponser', function ($query) use ($keyword) {
              $query->where('name', 'LIKE', "%$keyword%");})
            ;})
            ->latest()->paginate($perPage);
      } else {
          $children = Child::where('birth_date' , '<' , $now)
                           ->where('type' , 0)
                           ->latest()->paginate($perPage);
      }
      return view('poor-people.reports.males' , compact('children' , 'now'));
    }

    public function females(Request $request)
    {
      $keyword = $request->get('search');
      $perPage = 10;
      $now = \Carbon\Carbon::now()->subYears(18)->format('Y-m-d');

      if (!empty($keyword)) {
          $children = Child::where('birth_date' , '<' , $now)
          ->where('type' ,1)
          ->where(function($query) use ($keyword){
              $query->where('name', 'LIKE', "%$keyword%")
              ->orWhere('birth_date', 'LIKE', "%$keyword%")
              ->orWhereHas('family', function ($query) use ($keyword) {
              $query->where('name', 'LIKE', "%$keyword%");})
              ->orWhereHas('orphanSponser', function ($query) use ($keyword) {
              $query->where('name', 'LIKE', "%$keyword%");})
            ;})
            ->latest()->paginate($perPage);
      } else {
          $children = Child::where('birth_date' , '<' , $now)
                           ->where('type' , 1)
                           ->latest()->paginate($perPage);
      }
      return view('poor-people.reports.females' , compact('children'));
    }

    public function married(Request $request)
    {
      $keyword = $request->get('search');
      $perPage = 10;
      // $now = \Carbon\Carbon::now()->subYears(18)->format('Y-m-d');

      if (!empty($keyword)) {
          $children = Child::where('social_status' , 1)
          ->where('type' ,1)
          ->where(function($query) use ($keyword){
              $query->where('name', 'LIKE', "%$keyword%")
              ->orWhere('birth_date', 'LIKE', "%$keyword%")
              ->orWhereHas('family', function ($query) use ($keyword) {
              $query->where('name', 'LIKE', "%$keyword%");})
              ->orWhereHas('orphanSponser', function ($query) use ($keyword) {
              $query->where('name', 'LIKE', "%$keyword%");})
            ;})
            ->latest()->paginate($perPage);
      } else {
          $children = Child::where('social_status' , 1)
                           ->where('type' , 1)
                           ->latest()->paginate($perPage);
      }
      return view('poor-people.reports.married' , compact('children'));
    }
}
