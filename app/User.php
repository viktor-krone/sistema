<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class User extends Authenticatable
{
    use HasRoles, Notifiable, LogsActivity;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'rut_empresa',
        'rut',
        'name',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'password',
        'empresa_id',
    ];

    //log
    protected static $logAttributes = [
        'rut_empresa',
        'rut',
        'name',
        'apellidoPaterno',
        'apellidoMaterno',
        'email',
        'password',
        'empresa_id'
    ];
    protected static $logName = 'user';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token','api_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function image(){
        return $this->morphOne('App\Image','imageable');
    }

    public function empresa() {
        return $this->belongsTo(Empresa::class);
        //return $this->hasOne(Empresa::class);
    }


}
