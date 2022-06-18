<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function __construct()
    {
        $this->model = app(config('permission.model_user'));
    }
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable($this->model->getTable()))
            throw \Exception($this->model->getTable() . ' not exists');

        Schema::table($this->model->getTable(), function (Blueprint $table) {
            $table->boolean('is_admin')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        if (!Schema::hasTable($this->model->getTable()))
            throw \Exception($this->model->getTable() . ' not exists');

        Schema::table($this->model->getTable(), function (Blueprint $table) {
            $table->dropColumn('is_admin');
        });
    }
};
