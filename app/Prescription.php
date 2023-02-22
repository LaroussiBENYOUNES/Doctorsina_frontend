<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'prescription';
    
    protected $fillable = [
          'consultation_id',
          'label',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Prescription::observe(new UserActionsObserver);
    }
    
    public function consultation()
    {
        return $this->hasOne('App\Consultation', 'id', 'consultation_id');
    }


    
    
    
}