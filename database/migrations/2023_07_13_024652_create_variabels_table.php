<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVariabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('variabels', function (Blueprint $table) {
            $table->id();
            $table->integer('no');
            $table->string('nama_ruas');
            $table->decimal('panjang_ruas', 10, 3);
            $table->integer('variabel1');
            $table->integer('variabel2');
            $table->integer('variabel3');
            $table->integer('variabel4');
            $table->integer('variabel5');
            $table->integer('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('variabels');
    }
}
