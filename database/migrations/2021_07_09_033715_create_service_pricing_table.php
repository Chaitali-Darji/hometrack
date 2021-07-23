<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicePricingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_pricing', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_id');
            $table->string('code');
            $table->string('name');
            $table->decimal('price')->nullable();
            $table->decimal('commission')->default(0);
            $table->boolean('taxable')->default(1);
            $table->boolean('commission_paid')->default(1);
            $table->string('min_sq_ft')->nullable();
            $table->string('max_sq_ft')->default(0);
            $table->enum('type',['service_pricing','additional_pricing'])->default('service_pricing');
            $table->boolean('is_active')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_pricing');
    }
}
