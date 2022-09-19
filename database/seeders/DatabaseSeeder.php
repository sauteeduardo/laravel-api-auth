<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Message;

class DatabaseSeeder extends Seeder
{
  /**
    * Seed the application's database.
    *
    * @return void
    */
  public function run()
  {
    Message::factory()
      ->times(3)
      ->create();
  }
}
