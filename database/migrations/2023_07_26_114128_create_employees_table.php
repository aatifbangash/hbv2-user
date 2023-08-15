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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('company_id')->nullable()->default(null);
            $table->unsignedInteger('department_id')->nullable()->default(null);
            $table->unsignedInteger('location_id')->nullable()->default(null);
            $table->string('last_name', 128)->nullable()->default(null);
            $table->string('first_name', 128)->nullable()->default(null);
            $table->string('middle_name', 128)->nullable()->default(null);
            $table->string('suffix', 128)->nullable()->default(null);
            $table->string('description', 255)->nullable()->default(null);
            $table->string('job_title', 128)->nullable()->default(null);
            $table->string('virtual_phone', 128)->nullable()->default(null);
            $table->string('phone_extension', 128)->nullable()->default(null);
            $table->date('hire_date')->nullable()->default(null);
            $table->boolean('is_active')->unsigned()->default(1);
            $table->unsignedInteger('created_by')->nullable()->default(null);
            $table->unsignedInteger('updated_by')->nullable()->default(null);
            $table->timestamps();
            $table->unsignedInteger('deleted_by')->nullable()->default(null);
            $table->softDeletes();
            $table->index('company_id', 'i_company_id');
            $table->index('department_id', 'i_department_id');
            $table->index('location_id', 'i_location_id');
            $table->index('last_name', 'i_last_name');
            $table->index(['last_name', 'first_name', 'middle_name', 'suffix'], 'i_names');
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
        Schema::dropIfExists('employees');
    }
};
