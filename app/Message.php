<?php

namespace App;

use App\Filters\MessageFilters;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    const INCOMING = 'incoming';
    const OUTGOING = 'outgoing';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'to',
        'from',
        'body',
        'twilio_sid',
        'subscriber_number',
        'incoming',
        'scheduled_message_id',
    ];

    public function subscriber()
    {
        return $this->belongsTo('App\Subscriber', 'subscriber_number', 'number');
    }

    /*
     * Get the locale of the message if it's body is a trigger word.
     */
    public function getLocaleFromTrigger($key)
    {
        $locales = array_diff(scandir(resource_path('lang')), ['..', '.']);

        foreach ($locales as $locale) {
            if ($this->hasTrigger($key, $locale)) {
                return $locale;
            }
        }

        return null;
    }

    /*
     * Check if message matches a trigger word.
     */
    public function hasTrigger($key, $locale = null)
    {
        $triggers = app('translator')->get('triggers.' . $key, [], $locale);

        return in_array($this->normalizedBody(), $triggers);
    }

    /*
     * Clean up the message text.
     */
    public function normalizedBody()
    {
        return strtolower(trim($this->body));
    }

    /**
     * Apply filters.
     */
    public function scopeFilter($query, MessageFilters $filters)
    {
        return $filters->apply($query);
    }
}
