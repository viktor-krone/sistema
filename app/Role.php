<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Spatie\Activitylog\Traits\LogsActivity;

class Role extends Model
{
    use LogsActivity;
        
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'empresa_id','name', 'guard_name', 'display_name', 'description'
    ];


    protected $dates = ['created_at', 'updated_at'];


    //log
    protected static $logAttributes = [
        'empresa_id','name', 'guard_name', 'display_name', 'description'
    ];
    protected static $logName = 'anticipo';

    //only the `deleted` event will get logged automatically
    protected static $recordEvents = ['created','updated','deleted'];


    public function getDescriptionForEvent(string $eventName): string
    {
        return "Este modelo ha sido  {$eventName}";
    }
    //log


    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }


    public static function getByDisplayName($display_name)
    {
        return Role::where('display_name', '=', $display_name)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->get();
    }


    public static function getByName($name)
    {
        return Role::where('name', '=', str_slug($name))
        ->where('empresa_id', auth()->user()->empresa_id)
        ->first();
    }

    public function scopeName(Builder $query, $name){

        if($name == null || trim($name) == ""){
            return $query;
        }

        return $query->where('name', 'LIKE', '%'.$name.'%')
            ->where('empresa_id', auth()->user()->empresa_id);
    }

}
