<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class studentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = DB::table('students')->get();
        return view('home', ['students' => $students]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'marks' => 'required'
        ]);
        $name = $request->input('name');
        $email = $request->input('email');
        $marks = $request->input('marks');
    
        $data = array('name' => $name, 'email' => $email, 'marks' => $marks);
        DB::table('students')->insert($data);
        return redirect()->route('studentindex')->with('info', 'Student added successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
