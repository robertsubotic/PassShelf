<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('passwords', function (Blueprint $table) {
            $table->text('password')->change();
        });
    }

    public function down()
    {
        Schema::table('passwords', function (Blueprint $table) {
            $table->string('password', 255)->change();
        });
    }
};
