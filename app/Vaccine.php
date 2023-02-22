<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Vaccine extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'vaccine';
    
    protected $fillable = [
          'alias',
          'description'
    ];
    

    public static function boot()
    {
        parent::boot();

        Vaccine::observe(new UserActionsObserver);
    }
    
    
    
    
}