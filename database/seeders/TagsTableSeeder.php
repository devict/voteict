<?php

namespace Database\Seeders;

use App\Tag;
use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name' => 'Kansas',
            'category' => 'location',
            'subscriber_default' => true,
            'message_default' => true,
        ]);
        Tag::create([
            'name' => 'Sedgwick County',
            'category' => 'location',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Sumner County',
            'category' => 'location',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Butler County',
            'category' => 'location',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Harvey County',
            'category' => 'location',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Cowley County',
            'category' => 'location',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Reno County',
            'category' => 'location',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Kingman County',
            'category' => 'location',
            'subscriber_default' => true,
            'message_default' => false,
        ]);

        Tag::create([
            'name' => 'Voting Reminders',
            'category' => 'topic',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Election Info',
            'category' => 'topic',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Candidate Info',
            'category' => 'topic',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
        Tag::create([
            'name' => 'Events',
            'category' => 'topic',
            'subscriber_default' => true,
            'message_default' => false,
        ]);
    }
}
