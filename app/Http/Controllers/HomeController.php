<?php

namespace App\Http\Controllers;
use App\Models\Employee;
use App\Models\User;
use Auth;
use DB;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
    
        $page_name = "Home";
        $page_subpage = "Dashboard";
        $page_icon ="fa fa-home";
        $auth = Auth::user();
        $employees = Employee::all();
        foreach ($employees as $key) {
            if ($key->id == $auth->employee_id) {
                $user = $key;
            }
        }
        $id = $auth->id;

        if(User::find($id)->employee->workstation->work == "ADMINISTRATOR"){
            $data = DB::select('CALL total_monthly_sales()');
        }else{
            $data = DB::select('CALL monthly_sales('.$id.')');
        }

        
        return view('home', compact("user", "data", "page_name","page_subpage", "page_icon"));
    }

    // public function chart(Request $request)
    // {
    //     $auth = Auth::user();
    //     $id = $auth->id;
    //     $mes = date("m");
    //     $data = array();
       
    //     $data = DB::select('CALL monthly_sales('.$id.')');
        
       
    //     // return $data;
  
    //     return response(json_encode($data),200)->header('Content-type', 'text/plain');
    // }

}
