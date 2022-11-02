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
        Schema::create('candidates', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('ketua');
            $table->string('kelas_ketua');
            $table->string('jurusan_ketua');
            $table->string('wakil');
            $table->string('kelas_wakil');
            $table->string('jurusan_wakil');
            $table->text('visi');
            $table->text('misi_1')->nullable();
            $table->text('misi_2')->nullable();
            $table->text('misi_3')->nullable();
            $table->text('misi_4')->nullable();
            $table->text('misi_5')->nullable();
            $table->text('misi_6')->nullable();
            $table->text('misi_7')->nullable();
            $table->text('misi_8')->nullable();
            $table->text('misi_9')->nullable();
            $table->text('misi_10')->nullable();
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
        Schema::dropIfExists('candidates');
    }
};
