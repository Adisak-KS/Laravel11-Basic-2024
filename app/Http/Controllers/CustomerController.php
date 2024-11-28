<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        return response()->json(['customers' => 'Customer list']);
    }

    public function detail($id)
    {
        return response()->json(['customer' => 'Customer detail ' . $id]);
    }

    public function create(Request $request){
        return response()->json(['customer' => 'Customer created ' . $request->name]);
    }

    public function update(Request $request, $id){
        return response()->json(['customer' => 'Customer updated ' . $id . ' ' . $request->name]);
    }

    public function delete($id){
        return response()->json(['customer' => 'Customer deleted ' . $id]);
    }
}
