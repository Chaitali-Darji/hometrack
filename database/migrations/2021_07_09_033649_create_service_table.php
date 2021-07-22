<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('region_id')->nullable();
            $table->unsignedBigInteger('parent_id');
            $table->unsignedBigInteger('service_type_id');
            $table->string('name');
            $table->longText('description')->nullable();
            $table->string('youtube_or_vimeo_link')->nullable();
            $table->enum('display_section',['photography','listing','marketing','none'])->default('none');
            $table->boolean('notes_required')->default(1);
            $table->string('display_icon')->nullable();
            $table->integer('sort')->default(0);
            $table->string('code')->nullable();
            $table->longText('check_lists')->nullable();
            $table->boolean('is_active')->default(1);
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('service_type_id')->references('id')->on('service_types')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
