<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Subscriber extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'number',
        'name',
        'subscribed',
        'locale',
        'password',
        'login_attempt',
        'pledged',
        'referred_by',
        'hide_from_pledge_board',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function username()
    {
        return 'number';
    }

    public function messages()
    {
        return $this->hasMany(Message::class, 'subscriber_number', 'number');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function locationTags()
    {
        return $this->tags()->where('category', 'location');
    }

    public function topicTags()
    {
        return $this->tags()->where('category', 'topic');
    }

    public function subscribe()
    {
        return $this->update(['subscribed' => true]);
    }

    public function unsubscribe()
    {
        return $this->update(['subscribed' => false]);
    }

    public function withinValidVerifyTime()
    {
        $oneMinAgo = Carbon::now()->subMinute(1);
        $loginAttempt = Carbon::parse($this->login_attempt);

        return $loginAttempt->gt($oneMinAgo);
    }

    public static function scopeNewThisWeek($query)
    {
        return $query->where('created_at', '>', Carbon::now()->subDays(7));
    }

    public static function forLeaderboard()
    {
        $subs = self::where('pledged', true)
            ->where('hide_from_pledge_board', false)->get();

        return $subs->map(function ($sub) {
            $sub->referrals = $sub->numReferrals();

            return $sub;
        })->sortByDesc('referrals');
    }

    public static function newReferrerId()
    {
        $chars = 'abcdefghijklmnopqrstuvwxyz0123456789';
        $id = substr(str_shuffle($chars), 0, 8);
        while (self::where('referrer_id', $id)->count() > 0) {
            $id = substr(str_shuffle($chars), 0, 8);
        }

        return $id;
    }

    public function numReferrals()
    {
        return self::where('referred_by', $this->referrer_id)->count();
    }
}
