<?php

namespace App\Http\Controllers;

use App\Models\ManufacturingProducts;
use Illuminate\Http\Request;
use PhpOption\None;

class TestController extends Controller
{
    public function index($id=null){
        $products = ManufacturingProducts::all();
        $vars = [
            'products' => $products
        ];
        if(isset($id)){
            $json = ManufacturingProducts::find($id)->materials();
            $json = json_encode($json);
            $vars['materials'] = $json;
            dd(json_decode($json));
        }
        return view('test', $vars);
    }
    public function post(Request $request){
        dd($request->array);
    }
}

