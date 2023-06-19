<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('ngaji', function (Blueprint $table) {
            $table->text('rekaman');
            $table->text('juz');
            $table->text('surah');
            $table->text('ayat');
            $table->string('nim', 100);
            $table->unsignedBigInteger('id_ngaji')->autoIncrement();
            $table->timestamps();

            // Set foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ngaji');
    }
};
