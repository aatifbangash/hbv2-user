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
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->nullable()->default(null);
            $table->string('code', 16)->nullable()->default(null);
            $table->string('description', 255)->nullable()->default(null);
            $table->boolean('is_active')->unsigned()->default(1);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->softDeletes();
            $table->index('code', 'i_code');
            $table->index('name', 'i_name');
            $table->index('deleted_by', 'i_deleted_by');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('divisions');
    }
};
