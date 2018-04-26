<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('questions')->insert(['question_content' => 'What is the best video game of all time?']);
        DB::table('question_options')->insert(
            ['question_id' => '1', 'question_option_content' => 'Overwatch', 'question_option_name' => 'A']
        );
        DB::table('question_options')->insert(
            ['question_id' => '1', 'question_option_content' => 'World of Warcraft', 'question_option_name' => 'B']
        );
        DB::table('question_options')->insert(
            ['question_id' => '1', 'question_option_content' => 'PUBG', 'question_option_name' => 'C']
        );
        DB::table('question_options')->insert(
            ['question_id' => '1', 'question_option_content' => 'League of Legends', 'question_option_name' => 'D']
        );


    }
}
