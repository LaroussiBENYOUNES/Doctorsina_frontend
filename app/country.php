<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'country';
    
    protected $fillable = [
          'alias',
          'zone_id',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Country::observe(new UserActionsObserver);
    }
    
    public function zone()
    {
        return $this->hasOne('App\Zone', 'id', 'zone_id');
    }


    
    
    
}