<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Site extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'site';
    
    protected $fillable = [
          'medicalstructure_id',
          'country_id',
          'label',
          'alias',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Site::observe(new UserActionsObserver);
    }
    
    public function medicalstructure()
    {
        return $this->hasOne('App\MedicalStructure', 'id', 'medicalstructure_id');
    }


    public function country()
    {
        return $this->hasOne('App\Country', 'id', 'country_id');
    }


    
    
    
}