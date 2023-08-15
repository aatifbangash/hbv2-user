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
        Schema::create('personas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->foreignId('persona_type_id')->nullable()->constrained()->onDelete('SET NULL');
            $table->unsignedInteger('related_table_record_id')->nullable()->default(null);
            $table->string('name', 64)->nullable()->default(null);
            $table->string('initials', 4)->nullable()->default(null);
            $table->string('description', 255)->nullable()->default(null);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_primary')->unsigned()->default(0);
            $table->boolean('is_active')->unsigned()->default(0);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->softDeletes();
            $table->index('related_table_record_id', 'i_related_table_record_id');
            $table->index('sort_order', 'i_sort_order');
            $table->index('name', 'i_name');
            $table->index('initials', 'i_initials');
            $table->index(['sort_order', 'name'], 'i_sort_order_name');
            $table->index('is_primary', 'i_is_primary');
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
        Schema::dropIfExists('personas');
    }
};
