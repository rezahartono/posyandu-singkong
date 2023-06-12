<?php

use Carbon\Carbon;
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
        Schema::table('users', function (Blueprint $table) {
            $table->string('username', 50)->unique();
            $table->string('no_telp', 15)->nullable();
            $table->timestamp('tanggal_lahir')->default(Carbon::now());
            $table->enum('fl_admin', ['Y', 'N'])->default('N');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIfExists('username');
            $table->dropIfExists('no_telp');
            $table->dropIfExists('tanggal_lahir');
            $table->dropIfExists('fl_admin');
        });
    }
};
