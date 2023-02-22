<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Visitnature extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'visitnature';
    
    protected $fillable = [
          'alias',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Visitnature::observe(new UserActionsObserver);
    }
    
    
    
    
}