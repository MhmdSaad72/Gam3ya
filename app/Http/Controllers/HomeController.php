<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FamilyDetail;
use App\Child;
use App\Poor\FamilyDetail as PoorFamily;
use App\Poor\Child as PoorChild;
use App\Disabled\FamilyDetail as DisabledFamily;
use App\Disabled\Child as DisabledChild;
use App\Mosque\Mosque;
use App\Mosque\Worker;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $families = FamilyDetail::all()->count();
        $children = Child::all()->count();
        $poor_families = PoorFamily::all()->count();
        $poor_children = PoorChild::all()->count();
        $disabled_families = DisabledFamily::all()->count();
        $disabled_children = DisabledChild::all()->count();
        $mosques = Mosque::all()->count();
        $workers = Worker::all()->count();
        return view('dashboard' , compact('families' , 'children' , 'poor_families' , 'poor_children' , 'mosques' , 'workers' , 'disabled_families' , 'disabled_children' ));
    }
}
