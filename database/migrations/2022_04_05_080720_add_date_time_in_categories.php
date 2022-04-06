<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dateTime("date")->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->dateTime("time")->nullable(false)->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->boolean("status")->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
            $table->dropColumn("date","time","status");
        });
    }
};
