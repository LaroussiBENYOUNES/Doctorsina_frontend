<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Medicalstaff extends Model  {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'medicalstaff';
    
    protected $fillable = [
          'user_id',
          'user_id',
          'medicalstructure_id'
    ];
    

    public static function boot()
    {
        parent::boot();

        Medicalstaff::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }

    public function medicalstructure()
    {
        return $this->hasOne('App\MedicalStructure', 'id', 'medicalstructure_id');
    }


}