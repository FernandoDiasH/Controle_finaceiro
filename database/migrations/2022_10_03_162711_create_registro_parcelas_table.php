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
        Schema::create('registro_parcelas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('usuario_id')->constrained('usuario');
            $table->foreignId('lancamento_credito_id')->constrained('lancamento_credito');
            $table->date('dta_vencimento');
            $table->float('valor_parcela');
            $table->string('situacao', 10);
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
        Schema::dropIfExists('registro_parcelas');
    }
};
