<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Sett extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'sett';
    
    protected $fillable = ['fff'];
    

    public static function boot()
    {
        parent::boot();

        Sett::observe(new UserActionsObserver);
    }
    
    
    
    
}