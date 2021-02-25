<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dialog_id');
            $table->foreign('dialog_id')->references('id')->on('dialogs')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->bigInteger('sender_id');
            $table->bigInteger('receiver_id');
            $table->longText('body');
            $table->longText('image');
            $table->integer('check_read')->default(0);
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
        Schema::dropIfExists('messages');
    }
}
