<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('tenant_id');
            $table->unsignedBigInteger('table_id');
            $table->string('identify');
            $table->double('total');

            $table->enum('status',['SP','PR','PP','PF','PE']); 
            // SP = SEM PEDIDO, 
            // PR = PEDIDO REALIZADO, 
            // PP = PEDIDO EM PREPARO, 
            // PF = PEDIDO FINALIZADO, 
            // PE = PEDIDO ENTREGUE


            $table->timestamps();

            $table->foreign('tenant_id')
                ->references('id')
                ->on('tenants')
                ->onDelete('cascade');
            $table->foreign('table_id')
                ->references('id')
                ->on('tables')
                ->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sales');
    }
}
