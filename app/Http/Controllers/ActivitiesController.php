<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $activities = Activities::all()->sortBy(function($activity) {
            return $activity->when;
        });

        return view('activities.index', compact('activities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'when'=> 'required|date'
        ]);

        $activities = new Activities([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'when' => $request->get('when'),
        ]);

        $activities->save();

        return redirect('/activities')->with('success', 'Atividade salva com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function show(Activities $activities)
    {
        return view('activities.show',compact('activities'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function edit(Activities $activities)
    {
        return view('activities.edit',compact('activities'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activities $activities)
    {
        $request->validate([
            'title'=>'required',
            'description'=>'required',
            'when'=> 'required|date'
        ]);

        $activities->title = $request->get('title');
        $activities->description = $request->get('description');
        $activities->when = $request->get('when');
        $activities->save();

        return redirect('/activities')->with('success', 'Atividade alterada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activities $activities)
    {
        $activities->delete();

        return redirect('/activities')->with('success', 'Atividade excluída com sucesso!');
    }
}
