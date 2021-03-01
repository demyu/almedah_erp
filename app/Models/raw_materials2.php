<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class raw_materials2 extends Model
{
    /**
     * These are not all the fields accdg to the schema. 
     * These are just the fields that are able to be entered for the meantime. 
     */
    use HasFactory;
    protected $table = "raw_materials2";
    public $timestamps = false;
    protected $fillable = [
        'item_code',
        'item_name',
        'category',
        'UOM',
        'in_stock',
        'not_instock',
        'station_design_quantity',
        'station_assembly_quantity',
        'station_repair_quantity'
    ]; 
}
