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
        Schema::create('materiaps', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->foreignId('proveedor_id')->nullable()->constrained();
            $table->string('cantidad');
            $table->string('precio');
            $table->foreignId('area_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('materiaps');
    }
};
