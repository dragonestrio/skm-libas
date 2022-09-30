<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableDetailRespondentChangeTypeDataAnswer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table('respondent_detail', function (Blueprint $table) {
            DB::statement('ALTER TABLE respondent_detail ALTER COLUMN 
            answer TYPE integer USING (answer)::integer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('respondent_detail', function (Blueprint $table) {
            //
        });
    }
}
