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
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();
            $table->foreignId("persona_id")->nullable()->constrained()->onDelete('cascade');
            $table->unsignedInteger('site_id')->nullable()->default(null);
            $table->string('php_session_id', 255)->nullable()->default(null);
            $table->string('user_ip_address', 64)->nullable()->default(null);
            $table->string('user_agent', 255)->nullable()->default(null);
            $table->string('domain', 64)->nullable()->default(null);
            $table->string('token', 80)->nullable()->default(null);
            $table->boolean('is_persistent')->unsigned()->default(0);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->softDeletes();
            $table->index('site_id', 'i_site_id');
            $table->index('php_session_id', 'i_php_session_id');
            $table->index('token', 'i_token');
            $table->index('is_persistent', 'i_is_persistent');
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
        Schema::dropIfExists('sessions');
    }
};
