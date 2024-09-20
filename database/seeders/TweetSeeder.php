<?php

namespace Database\Seeders;
use App\Models\Tweet;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TweetSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $now = Carbon::now();
    $keyword = 'test';

    for ($i = 0; $i < 30; $i++) {
      Tweet::factory()->create([
        'tweet' => "This is a {$keyword} tweet",
        'created_at' => $now->copy()->subSeconds(100 - $i),
        'updated_at' => $now->copy()->subSeconds(100 - $i),
      ]);
    }

    for ($i = 30; $i < 100; $i++) {
      Tweet::factory()->create([
        'created_at' => $now->copy()->subSeconds(100 - $i),
        'updated_at' => $now->copy()->subSeconds(100 - $i),
      ]);
    }
  }
}

