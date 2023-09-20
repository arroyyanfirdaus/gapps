<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student-class.index', [
            'classes' => StudentClass::get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student-class.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $class = new StudentClass();
        $class->name = $request->name;
        $class->slug = $request->slug;

        $class->save();

        session()->flash('success', 'Data Kelas Ditambahkan!!');

        return redirect()->route('student-classes.index');
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
    public function edit($id)
    {
        $class = StudentClass::find($id);
        return view('student-class.edit', [
            'class' => $class,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $class = StudentClass::find($id);
        $class->name = $request->name;
        $class->slug = $request->slug;

        $class->save();

        session()->flash('success', 'Data Kelas Diperbarui!!');

        return redirect()->route('student-classes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $class = StudentClass::find($id);

        if (!$class) {
            return redirect()->route('student-classes.index')->with('error', 'Siswa tidak ditemukan');
        }

        $class->delete();
        return redirect()->route('student-classes.index')->with('info', 'Unit Kerja berhasil dihapus');
    }
}
