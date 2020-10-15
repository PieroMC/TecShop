<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\DocumentType;
use App\Models\Workstation;
use Auth;
use DB;
class EmployeeController extends Controller
{


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_name = "Employee";
        $page_subpage = "All";
        $page_icon ="fa fa-users";
        $auth = Auth::user();
        $employees = Employee::all();
        foreach ($employees as $key) {
            if ($key->id == $auth->employee_id) {
                $user = $key;

            }
        }

        //return User::find(1)->employee->name;
        //return Employee::find(1)->user->name;
        return view('employee.index',compact("user","employees","page_name","page_subpage", "page_icon"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $page_name = "Employee";
        $page_subpage = "create";
        $page_icon ="fa fa-user-plus";
        $auth = Auth::user();
        $employees = Employee::all();
        foreach ($employees as $key) {
            if ($key->id == $auth->employee_id) {
                $user = $key;
            }
        }

        $document_type = DocumentType::all();
        $workstation = Workstation::all();
        return view('employee.create',compact("user", "workstation","document_type","page_name","page_subpage", "page_icon"));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        //return $request;
        $employee = Employee::create([

            'name' => $request->name, 
            'lastname' => $request->lastname, 
            'document_type_id' => $request->document_type_id, 
            'number_document' => $request->number_document, 
            'date_birth' => $request->date_birth, 
            'email' => $request->email,
            'telephone' => $request->telephone, 
            'address' => $request->address,
            'workstation_id' => $request->workstation_id,

        ]);

        User::create([
            'name' => $request->username,
            'password' => Hash::make($request->password),
            'employee_id' => $employee->id,
        ]);


        return redirect()->route('employee');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //
        // return $employee;
        $page_name = "Employee";
        $page_subpage = "update";
        $page_icon ="fa fa-user-edit";
        $auth = Auth::user();
        $employees = Employee::all();
        foreach ($employees as $key) {
            if ($key->id == $auth->employee_id) {
                $user = $key;
            }
        }

    //    $employee=Employee::find($employee->$id);
       $documentType = DocumentType::all();
       $workstation = Workstation::all();
    //    return $documentType;
       return view('employee.edit',compact("user", "employee", "workstation","documentType","page_name","page_subpage", "page_icon"));
    //    return view('employee.edit',compact('employee','em', 'documentType', 'workstation'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //
        //
        Employee::find($employee->id)->update($request->all());
        return redirect()->route('employee');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        //
        Employee::find($employee->id)->delete();
        return redirect()->route('employee');
    }
}
