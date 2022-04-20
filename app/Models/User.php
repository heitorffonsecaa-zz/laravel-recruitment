<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasProfilePhoto, Notifiable, TwoFactorAuthenticatable, SoftDeletes;

    protected $table = 'users';

    protected $fillable = [
        'uuid',
        'role_id',
        'first_name',
        'last_name',
        'description',
        'birthdate',
        'email',
        'password'
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret'
    ];

    protected $casts = [
        'birthdate' => 'date',
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    protected $appends = ['profile_photo_url'];

    /**
     * relationship with addresses
     *
     * @return MorphMany
     */
    public function addresses(): MorphMany
    {
        return $this->morphMany(Address::class, 'addressable');
    }

    /**
     * relationship with activity history
     *
     * @return HasMany
     */
    public function activityHistory(): HasMany
    {
        return $this->hasMany(ActivityHistory::class, 'user_id', 'id');
    }

    /**
     * relationship with business history
     *
     * @return HasMany
     */
    public function businessHistory(): HasMany
    {
        return $this->activityHistory()->where('type', 'business');
    }

    /**
     * relationship with courses
     *
     * @return HasMany
     */
    public function courses(): HasMany
    {
        return $this->activityHistory()->where('type', 'course');
    }

    /**
     * relationship with education history
     *
     * @return HasMany
     */
    public function educationHistory(): HasMany
    {
        return $this->activityHistory()->where('type', 'education');
    }

    /**
     * relationship with links
     *
     * @return MorphMany
     */
    public function links(): MorphMany
    {
        return $this->morphMany(Link::class, 'linkable');
    }

    /**
     * relationship with phones
     *
     * @return MorphMany
     */
    public function phones(): MorphMany
    {
        return $this->morphMany(Phone::class, 'poneble');
    }

    /**
     * relationship with role
     *
     * @return BelongsTo
     */
    public function role(): BelongsTo
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * relationship with skills
     *
     * @return BelongsToMany
     */
    public function skills(): BelongsToMany
    {
        return $this->belongsToMany(Skill::class, 'users_skills', 'user_id', 'skill_id')->withPivot([
            'experience_time'
        ]);
    }
}
