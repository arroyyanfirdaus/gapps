<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentClass;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    public function index()
    {

        return view('student.index', [
            'students' => Student::latest()->get()
        ]);
    }

    public function create()
    {
        return view('student.create', [
            'classes' => StudentClass::get(),
        ]);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'photo' => ['image'],
        ], [
            'name.required' => 'Kolom nama harus di isi',
            'address.required' => 'Alamat harus di isi',
            'phone_number.required' => 'No Kontak harus di isi',
        ]);


        $students = new Student();
        $photo = null;

        if ($request->hasFile('photo')) {
            $photo = $request->file('photo')->store('photos');
        }
        $students->name = $request->name;
        $students->address = $request->address;
        $students->phone_number = $request->phone_number;
        $students->student_class_id = $request->student_class_id;
        $students->photo = $photo;

        $students->save();

        // session()->flash('success', 'Data Berhasil Ditambahkan.');

        return redirect()->route('student.index')->with('success', 'Siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $student = Student::find($id);

        return view('student.edit', [
            'classes' => StudentClass::get(),
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'min:3'],
            'address' => ['required', 'min:10'],
            'phone_number' => ['required', 'numeric'],
            'photo' => ['image'],
        ]);

        $students = Student::find($id);
        $photo = $students->photo;

        if ($request->hasFile('photo')) {
            if ($photo != null) {
                if (Storage::exists($photo)) {
                    Storage::delete($photo);
                }
            }
            $photo = $request->file('photo')->store('photos');
        }
        $students->name = $request->name;
        $students->address = $request->address;
        $students->phone_number = $request->phone_number;
        $students->student_class_id = $request->student_class_id;
        $students->photo = $photo;




        $students->save();

        return redirect()->route('student.index')->with('success', 'Siswa berhasil diperbarui');
    }

    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return redirect()->route('student.index')->with('error', 'Siswa tidak ditemukan');
        }

        $student->delete();
        return redirect()->route('student.index')->with('info', 'Data Karyawan berhasil dihapus');
    }
}
