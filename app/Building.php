<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Building extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'building';
    
    protected $fillable = [
          'site_id',
          'label',
          'alias',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Building::observe(new UserActionsObserver);
    }
    
    public function site()
    {
        return $this->hasOne('App\Site', 'id', 'site_id');
    }


    
    
    
}