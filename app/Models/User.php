<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles; // Gunakan HasRoles sekali di sini

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'last_name',
        'email',
        'password',
        'role',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Get the user's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        // Check if first_name is set, if not fallback to name
        if (is_null($this->name) || is_null($this->last_name)) {
            return $this->name ?? 'Unknown Author'; // Fallback to name or return default value
        }

        return "{$this->name} {$this->last_name}";
    }

    /**
     * Set the user's password.
     *
     * @param string $value
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Custom role checking methods
    public function isSuperAdmin()
    {
        return $this->hasRole('superadmin');
    }

    public function isAdmin()
    {
        return $this->hasRole('administrator');
    }

    public function isUser()
    {
        return $this->hasRole('user');
    }
    public function hasRole($role)
    {
        return $this->role === $role;
    }
    // app/Models/User.php
    public function getRoleNameAttribute()
    {
        return ucfirst($this->role); // Mengubah role menjadi huruf kapital awal
    }
    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id'); // Sesuaikan dengan nama kolom yang digunakan
    }

    public function services()
    {
        return $this->hasMany(Service::class, 'author_id');
    }
}
