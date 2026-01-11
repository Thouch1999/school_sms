<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::orderBy('student_id', 'desc')->paginate(4);
        return view('students.index', compact('students'));
    }
    public function create()
    {
        $year = date('Y');
        $latestStudent = Student::where('student_code', 'like', "STU-$year-%")
            ->orderBy('student_id', 'desc')
            ->first();

        if ($latestStudent) {
            // Extract the sequence number (last 3 digits)
            $parts = explode('-', $latestStudent->student_code);
            $sequence = intval(end($parts)) + 1;
        } else {
            $sequence = 1;
        }

        $generatedCode = 'STU-' . $year . '-' . str_pad($sequence, 3, '0', STR_PAD_LEFT);

        return view('students.create', compact('generatedCode'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'student_code' => 'required|unique:students,student_code|max:20',
            'full_name' => 'required|max:100',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'email' => 'nullable|email|unique:students,email|max:100',
            'phone' => 'nullable|max:20',
            'address' => 'nullable|string',
            'nationality' => 'nullable|max:50',
            'status' => 'required|in:Active,Inactive,Graduated,Suspended',
            'photo' => 'nullable|image|max:2048', // Max 2MB
        ]);

        if ($request->hasFile('photo')) {
            $path = $request->file('photo')->store('students', 'public');
            $validatedData['photo'] = 'storage/' . $path;
        }

        Student::create($validatedData);

        return redirect()->route('students')->with('success', 'Student created successfully!');
    }
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);

        $validatedData = $request->validate([
            'student_code' => 'required|max:20|unique:students,student_code,' . $id . ',student_id',
            'full_name' => 'required|max:100',
            'gender' => 'required|in:Male,Female,Other',
            'date_of_birth' => 'required|date',
            'email' => 'nullable|email|max:100|unique:students,email,' . $id . ',student_id',
            'phone' => 'nullable|max:20',
            'address' => 'nullable|string',
            'nationality' => 'nullable|max:50',
            'status' => 'required|in:Active,Inactive,Graduated,Suspended',
            'photo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('photo')) {
            // Delete old photo if it exists
            if ($student->photo && file_exists(public_path($student->photo))) {
                unlink(public_path($student->photo));
            }

            $path = $request->file('photo')->store('students', 'public');
            $validatedData['photo'] = 'storage/' . $path;
        }

        $student->update($validatedData);

        return redirect()->route('students')->with('success', 'Student updated successfully!');
    }
    public function view($id)
    {
        $student = Student::findOrFail($id);
        return view('students.view', compact('student'));
    }
    public function destroy($id)
    {
        $student = Student::findOrFail($id);

        // Delete photo if it exists
        if ($student->photo && file_exists(public_path($student->photo))) {
            unlink(public_path($student->photo));
        }

        $student->delete();
        return redirect()->route('students')->with('success', 'Student deleted successfully!');
    }
}
