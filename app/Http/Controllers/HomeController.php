<?php

namespace App\Http\Controllers;

use App\Models\Activities;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activities::all()->where('when', '=', date('Y-m-d 00:00:00'))->sortBy(function($activity) {
            return $activity->when;
        });

        return view('home.index', compact('activities'));
    }
}
