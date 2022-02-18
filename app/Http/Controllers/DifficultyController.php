<?php

namespace App\Http\Controllers;

use App\Models\Difficulty;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Brian2694\Toastr\Facades\Toastr;

class DifficultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $difficulties = Difficulty::all();

        $context = [
            'difficulties' => $difficulties,
        ];

        return view('admin.difficulty.index-difficulty', $context);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.difficulty.new-difficulty');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // Field validation
        request()->validate([
            'name' => 'required|min:4',
        ]);

        $difficulty = new Difficulty;
        $difficulty->name = Str::lower(request('name'));
        $difficulty->name = Str::ucfirst($difficulty->name);
        $difficulty->slug = Str::slug(request('name'), '_');
        $difficulty->save();

        Toastr::success('Difficulty added successfuly!', 'Sysytem message');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Difficulty $difficulty)
    {
        //
        return view('admin.difficulty.edit-difficulty', ['difficulty' => $difficulty]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Difficulty $difficulty)
    {
        // Validations
        request()->validate([
            'name' => 'required|min:4',
        ]);

        $difficulty->name = Str::lower(request('name'));
        $difficulty->name = Str::ucfirst($difficulty->name);
        $difficulty->slug = Str::slug(request('name'), '_');
        $difficulty->save();
        
        Toastr::success('Difficulty updated successfuly!', 'System message');

        return redirect(route('difficulty.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
