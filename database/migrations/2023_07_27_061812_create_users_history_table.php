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
        Schema::create('users_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->string('full_name', 128)->nullable()->default(null);
            $table->string('email', 128)->nullable()->default(null);
            $table->string('phone', 128)->nullable()->default(null);
            $table->string('password', 255)->nullable()->default(null);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->dateTime('created_at')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->dateTime('updated_at')->nullable()->default(null);
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->dateTime('deleted_at')->nullable()->default(null);

            $table->index('email', 'i_email');
            $table->index('phone', 'i_phone');
            $table->index('deleted_by', 'i_deleted_by');

            $table->comment('Store changes to name (married), email, and phone; email or phone will be used to login;');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_history');
    }
};
