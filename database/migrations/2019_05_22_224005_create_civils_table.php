<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCivilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civils', function (Blueprint $table) {
            $table->uuid('id');
            $table->uuid('religion_id');
            $table->uuid('harmlet_id');
            $table->string('nkk',20)->nullable()->default('text');
            $table->string('nik')->nullable()->default('text');
            $table->string('name')->nullable()->default('text');
            $table->date('birth_date')->nullable();
            $table->string('sex',15)->nullable()->default('text');
            $table->string('marital_status',20)->nullable()->default('text');
            $table->string('address')->nullable()->default('text');
            $table->string('rt', 10)->nullable()->default('text');
            $table->string('rw', 10)->nullable()->default('text');
            $table->string('death_status',20)->nullable()->default('text');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('civils');
    }
}
