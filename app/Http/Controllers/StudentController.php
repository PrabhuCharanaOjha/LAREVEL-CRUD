<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Student;

use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{

    public function index()
    {
        return view("home");
        // $students = Student::all();
        // return view('home')->compact('students', json_decode($students));
    }


    public function create(Request $request)
    {
        // $student = new Student;
        // $student->name = $request->name;
        // $student->city = $request->city;
        // $student->marks = $filename;
        // $student->save();
        // return redirect(route('index'));
        $image = $request->file('marks');
        $filename = time() . '.' . $image->getClientOriginalExtension();

        DB::table('students')->insertGetId(
            ['name' => $request->name, 'city' => $request->city, 'marks' => $filename]
        );

        $image->move(public_path('images'), $filename);
        return response()->json(['msg' => 'success']);
    }


    public function edit($id)
    {
        $student = Student::find($id);
        return view('editform', ['student' => $student]);
    }


    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->name = $request->name;
        $student->city = $request->city;
        $student->marks = $request->marks;
        $student->save();
        return redirect(route('index'));
    }


    public function destroy($id)
    {
        Student::destroy($id);
        return redirect(route('index'));
    }

    public function getAllData()
    {
        $students = Student::all();
        return response()->json(['students' => $students]);

    }
}
