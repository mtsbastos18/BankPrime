<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordReset; // Or the location that you store your notifications (this is default).

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'login',
        'cpf',
        'data_nascimento',
        'sexo',
        'telefone',
        'celular',
        'password',
        'id_permissao',
        'id_parceiro',
        'status',
        'primeiro_login'
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

    public function permissao()
    {
        return $this->hasOne(PermissaoUsuario::class, 'id', 'id_permissao');
    }

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new PasswordReset($token));
    }
}


// ALTER TABLE `bankprime2`.`users` 
// ADD COLUMN `primeiro_login` INT NULL DEFAULT 1 AFTER `updated_at`;
