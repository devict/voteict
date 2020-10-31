<?php

namespace Database\Factories;

use App\ScheduledMessage;
use Illuminate\Database\Eloquent\Factories\Factory;

class ScheduledMessageFactory extends Factory
{
    protected $model = ScheduledMessage::class;

    public function withTags($tags)
    {
        return $this->afterCreating(function ($subscriber) use ($tags) {
            $subscriber->tags()->attach(array_map(fn ($tag) => $tag->id, $tags));
        });
    }

    public function definition()
    {
        return [
            'body_en' => $this->faker->text(160),
            'body_es' => $this->faker->text(160),
            'target_sms' => 1,
            'target_twitter' => 1,
            'send_at' => now()->addMinutes(1)->toDateTimeString(),
            'sent' => false,
        ];
    }
}
