<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRawMaterialsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('env_raw_materials')) {
            Schema::create('env_raw_materials', function (Blueprint $table) {
                $table->id();
                $table->string('item_code');
                $table->string('item_name');
                $table->string('item_image');
                $table->string('category_id');
                $table->float('unit_price');
                $table->float('total_amount');
                $table->string('rm_status');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('env_raw_materials');
    }
}
