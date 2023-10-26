<?php

namespace App\Models;

 //use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Post;
use App\Models\Message;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
    class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
    public function messages(){
        return $this->hasMany(Message::class);
    }
    public function posts(){
        return $this->hasMany(Post::class);
    }

    public function receivesBroadcastNotificationsOn(){
        return 'post_like'.$this->id;
    }
    public function isAdmin()
{
    return $this->isAdmin === 1; // Assuming you have a 'role' field that determines the user's role.
}

}
