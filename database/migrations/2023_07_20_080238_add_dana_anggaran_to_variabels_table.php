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
        Schema::table('variabels', function (Blueprint $table) {
            $table->decimal('dana_anggaran', 12, 2)->default(0)->after('persen_tidak_mantap');
        });
    }

    public function down()
    {
        Schema::table('variabels', function (Blueprint $table) {
            $table->dropColumn('dana_anggaran');
        });
    }
};
