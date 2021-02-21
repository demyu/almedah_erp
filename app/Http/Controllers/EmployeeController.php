<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Employee;
use DB;
class EmployeeController extends Controller
{
    public function index(){
        // $position = Employee::whereNotNull('position')->distinct();
        return view('modules.employee');
    }
    public function store(Request $request)
    {
        try {
            $uniqueEmail = $this->validate($request, [
                'email' => 'required|unique:env_employees,email'
            ]);
            $form_data = $request->input();
            $data = \App\Models\Employee::create($form_data);
            return response($data);
        } catch (Exception $e) {
            return $e;
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $employee = Employee::where('id', $id)->first();
            // $imagePath = request('profile_picture');
            // if(request('profile_picture')){
            //     $imagePath = request('profile_picture')->store('uploads', 'public');
            //     $employee->profile_picture = $imagePath;
            // }
            $employee->last_name = $request->input('last_name');
            $employee->first_name = $request->input('first_name');
            $employee->position = $request->input('position');
            $employee->gender = $request->input('gender');
            $employee->contact_number = $request->input('contact_number');

            if(!($request->input('active_status')==null)){
                $employee->active_status = $request->input('active_status');
            }
            $employee->save();
            return response($employee);
        } catch (Exception $e) {
            return response('There was an error upon updating!');
        }
    }

    public function updateimage(Request $request, $id)
    {
        try {
            $employee = Employee::where('id', $id)->first();
            $file = $request->hasFile('profile_picture');
            if($request->hasFile('profile_picture')){
                $imagePath = request('profile_picture')->store('uploads', 'public');
                $employee->profile_picture = $imagePath;
            }
            $employee->save();
            return response($imagePath);
        } catch (Exception $e) {
            return response('There was an error upon updating!');
        }
    }
    // this updates the active status in the employees dataTable
    public function toggle(Request $request, $id, $stat)
    {
        try {
            $employee = Employee::where('id', $id)->first();
            $employee->active_status = $stat;
            $employee->save();
            return response('Account has been activated!');
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed'
            ]);
        }
    }

}
