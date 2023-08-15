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
        Schema::create('persona_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('home_page_id')->nullable()->default(null);
            $table->string('name', 64)->nullable()->default(null);
            $table->enum('related_table_name', ['employees', 'customers', 'trade_partner_users', 'impersonations', 'aliases', 'prospects']);
            $table->unsignedInteger('sort_order')->default(0);
            $table->boolean('is_active')->unsigned()->default(1);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->softDeletes();
            $table->index('home_page_id', 'i_home_page_id');
            $table->index('sort_order', 'i_sort_order');
            $table->index('name', 'i_name');
            $table->index(['sort_order', 'name'], 'i_sort_order_name');
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
        Schema::dropIfExists('persona_types');
    }
};
