<?php

use App\Topic;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = ['News', 'Curiosità', 'Articoli Scientifici', 'Tutorial', 'Off Topic'];
        foreach ($topics as $topic) {
            $newTopic = new Topic();
            $newTopic->name = $topic;
            $newTopic->slug = Str::slug($topic);
            $newTopic->save();
        }
    }
}
