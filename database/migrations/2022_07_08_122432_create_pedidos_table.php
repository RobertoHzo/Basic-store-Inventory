<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('order_number')->unique();//
            $table->foreignId('user_id')->nullable()->constrained();

            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending');//
            $table->unsignedInteger('item_count');//
            $table->decimal('total', 20, 6);//

            // $table->string('total');
            $table->string('folio');
            $table->boolean('payment_status')->default(1);//

            $table->text('notes')->nullable();//

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pedidos');
    }
};
