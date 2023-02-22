<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalStructureSpeciality extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'medicalstructurespeciality';
    
    protected $fillable = [
          'speciality_id',
          'medicalstructure_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        MedicalStructureSpeciality::observe(new UserActionsObserver);
    }
    
    public function speciality()
    {
        return $this->hasOne('App\Speciality', 'id', 'speciality_id');
    }


    public function medicalstructure()
    {
        return $this->hasOne('App\MedicalStructure', 'id', 'medicalstructure_id');
    }


    
    
    
}