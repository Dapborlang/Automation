<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMrtRechargesTable extends Migration
{
    
    public function up()
    {
        Schema::create('mrt_recharges', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mrt_agent_id');
            $table->unsignedBigInteger('mrt_rc_type_id');
            $table->string('mrt_rc_no');
            $table->unsignedBigInteger('mrt_service_provider_id');
            $table->unsignedBigInteger('mrt_plan_value_id');
            $table->date('date');
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    
    public function down()
    {
        Schema::dropIfExists('mrt_recharges');
    }
}
