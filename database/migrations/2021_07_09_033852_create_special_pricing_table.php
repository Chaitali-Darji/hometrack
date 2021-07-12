<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSpecialPricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('special_pricing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_pricing_id');
            $table->unsignedBigInteger('special_pricing_id');
            $table->decimal('price')->nullable();
            $table->boolean('is_active')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('service_pricing_id')->references('id')->on('service_pricing')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('special_pricing_id')->references('id')->on('special_pricing_columns')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('special_pricing');
    }
}
