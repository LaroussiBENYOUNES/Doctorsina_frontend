<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Usermenu extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'usermenu';
    
    protected $fillable = [
          'menutype_id',
          'parentid',
          'alias',
          'level',
          'icon',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Usermenu::observe(new UserActionsObserver);
    }
    
    public function menutype()
    {
        return $this->hasOne('App\Menutype', 'id', 'menutype_id');
    }
    /**
     * Get attribute from active format binary
     * @$value $input
     *
     * @return string
     */
    public function setActivatedAttribute($value){
        $this->attributes['activated'] = (empty($value) ? 0 : $value);
    }
    
}