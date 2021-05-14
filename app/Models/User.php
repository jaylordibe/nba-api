<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable {

    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token'
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'email_verified_at'
    ];

    /**
     * Checks if the object is empty.
     * @return bool
     */
    public function isEmpty(): bool {
        return empty($this->id);
    }

    /**
     * Checks if the object is not empty.
     * @return bool
     */
    public function isNotEmpty(): bool {
        return !empty($this->id);
    }

    /**
     * Get the entity id.
     * @return int
     */
    public function getId(): int {
        return (int) $this->id;
    }
}
