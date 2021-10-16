<?php

namespace App\Http\Controllers;

use App\Models\participation;
use Illuminate\Http\Request;
namespace App\Http\Requests\ParticpationFormRequest;
class ParticipationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParticpationFormRequest $request)
    {
        //
        return "hello";
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function show(participation $participation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function edit(participation $participation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, participation $participation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\participation  $participation
     * @return \Illuminate\Http\Response
     */
    public function destroy(participation $participation)
    {
        //
    }
}
