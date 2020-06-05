<?php

use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taskContents = ['勉強', '料理', '洗濯'];

        foreach ($taskContents as $content)
        {
            DB::table('tasks')->insert([
                'content' => $content,
                'created_at' => new DateTime('now'),
                'updated_at' => new DateTime('now')
            ]);
        }
    }
}
