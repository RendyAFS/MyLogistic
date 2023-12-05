<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Handbag;
use App\Models\Lecture;
use Illuminate\Http\Request;

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
        $handbags = Handbag::all();
        $lectures = Lecture::all();
        $activities = Activity::all();
        return view('admin.home', compact('handbags', 'lectures', 'activities'));
    }

    public function getData(Request $request)
    {

        $activities = Activity::all();

        if ($request->ajax()) {
            return datatables()->of($activities)
                ->addIndexColumn()
                ->toJson();
        }
    }
}
