<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('microservices', function (Blueprint $table) {
            $table->id();
            $table->string('name', 64)->nullable()->default(null);
            $table->string('tag', 16)->nullable()->default(null);
            $table->string('description', 1000)->nullable()->default(null);
            $table->string('shared_token', 80)->nullable()->default(null)->comment('for identification');
            $table->string('private_token', 80)->nullable()->default(null)->comment('for encryption');
            $table->boolean('is_active')->unsigned()->default(1);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->softDeletes();
            $table->index('name', 'i_name');
            $table->index('tag', 'i_tag');
            $table->index('shared_token', 'i_shared_token');
            $table->index('is_active', 'i_is_active');
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
        Schema::dropIfExists('microservices');
    }
};
