<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class StructureType extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'structuretype';
    
    protected $fillable = [
          'name',
          'alias',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        StructureType::observe(new UserActionsObserver);
    }
    
    
    
    
}