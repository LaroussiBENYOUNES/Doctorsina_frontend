<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalStructure extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'medicalstructure';
    
    protected $fillable = [
          'label',
          'alias',
          'description',
          'structuretype_id',
          'country_id',
          'signaled',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        MedicalStructure::observe(new UserActionsObserver);
    }
    
    public function structuretype()
    {
        return $this->hasOne('App\StructureType', 'id', 'structuretype_id');
    }

    public function country()
    {
        return $this->hasOne('App\Country', 'id', 'country_id');
    }


    
    
    
}