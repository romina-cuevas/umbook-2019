<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use Notifiable;
    use HasMediaTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    use Sluggable,SluggableScopeHelpers;
    protected $fillable = [
        'first_name', 'last_name', 'birthday','career', 'password', 'slug','avatar','email'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'first_name'
            ]
        ];
    }

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeSearch($query, $name)
    {
        return $query->where('name','LIKE','%$name%');
    }

    public function friends()
    {
        return $this->belongsToMany(User::class, 'friends', 'user_id', 'friend_id')
            ->wherePivot('accepted', '=', 1)
            ->withPivot('accepted');
    }

    public function friendOf()
    {
        return $this->belongsToMany(User::class, 'friends', 'friend_id', 'user_id')
            ->wherePivot('accepted', '=', 1)
            ->withPivot('accepted');
    }

    public function registerMediaConversions(Media $media = null)
    {
        $this->addMediaConversion('thumb')
            ->width(60)
            ->height(60);
    }

    public function groups(){
        return $this->hasMany('App\Group');
    }
}
