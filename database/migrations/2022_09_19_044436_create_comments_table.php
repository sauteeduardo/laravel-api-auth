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
      $table->timestamps(); // created_at and updated_at
      $table->string('name');
      $table->string('text');
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