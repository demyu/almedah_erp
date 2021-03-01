<?php

namespace App\Http\Controllers;

use App\Models\raw_materials2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RawMaterials2Controller extends Controller
{
    function index(){
        
        $result = DB::table("raw_materials2")
	    ->select(DB::raw("item_name, SUM(station_design_quantity) as design, SUM(station_assembly_quantity) as assemblyi, SUM(station_repair_quantity) as repair"))
	    ->orderBy("item_name")
	    ->groupBy("item_name")
	    ->get();

        $result2 = DB::table("raw_materials2")
	    ->select(DB::raw("category, SUM(in_stock) as instock_category"))
	    ->orderBy("category")
        ->groupBy("category")
	    ->get();
        
        $result3 = raw_materials2::get();

        $design_Sum = DB::table("raw_materials2")
	    ->select(DB::raw("SUM(station_design_quantity) as design_sum"))
	    ->pluck('design_sum');


        $assembly_Sum = DB::table("raw_materials2")
	    ->select(DB::raw("SUM(station_assembly_quantity) as assembly_sum"))
	    ->pluck('assembly_sum');

        $repair_Sum = DB::table("raw_materials2")
	    ->select(DB::raw("SUM(station_repair_quantity) as repair_sum"))
	    ->pluck('repair_sum');

        $inStock_Sum = DB::table("raw_materials2")
	    ->select(DB::raw("SUM(in_stock) as inStock_sum"))
	    ->pluck('inStock_sum');

        $notInStock_Sum = DB::table("raw_materials2")
	    ->select(DB::raw("SUM(not_instock) as notInStock_Sum"))
	    ->pluck('notInStock_Sum');

        return view('modules.ABCAnalysis', ['result' => $result, 'result2' => $result2, 'result3' => $result3, 'design_Sum'=>$design_Sum, 'assembly_Sum' =>$assembly_Sum, 'repair_Sum' => $repair_Sum, 'inStock_Sum'=>$inStock_Sum, 'notInStock_Sum' =>$notInStock_Sum]);
    }
}
