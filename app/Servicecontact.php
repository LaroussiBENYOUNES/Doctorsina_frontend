<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Servicecontact extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'servicecontact';
    
    protected $fillable = [
          'service_id',
          'contact',
          'contacttype'
    ];
    

    public static function boot()
    {
        parent::boot();

        Servicecontact::observe(new UserActionsObserver);
    }
    
    public function service()
    {
        return $this->hasOne('App\Service', 'id', 'service_id');
    }


    
    
    
}