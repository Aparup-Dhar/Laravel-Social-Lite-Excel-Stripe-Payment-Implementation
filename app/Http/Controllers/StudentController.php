<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Maatwebsite\Excel\Facades\Excel;
use App\Imports\StudentsImport;
use Exception;
use App\Models\Student;


class StudentController extends Controller
{
    

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $students = Student::all();
        return view('import',compact('students'));

    }

    public function importExcel(Request $request)
    {
        try {

            Excel::import(new StudentsImport, $request->file('student_import_file'));
            return redirect()->back()->with('message','Imported Successfully');

        } catch (Exception $ex) {

            return redirect()->back()->with('message','Something went wrong.! Please Check Whether Excel Is Empty Or Compare Excel Sample.');
        }
    }
}