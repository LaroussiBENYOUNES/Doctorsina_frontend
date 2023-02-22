<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Speciality extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'speciality';
    
    protected $fillable = [
          'name',
          'alias',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Speciality::observe(new UserActionsObserver);
    }

    public function doctor(){
        return $this->hasMany(Doctor::class);
    }

    public function medicalstructure(){
        return $this->hasMany(Medicalstructure::class);
    }
    /**
     * Get attribute from active format binary
     * @$value $input
     *
     * @return string
     */
    public function setActivatedAttribute($value){
        $this->attributes['activated'] = (empty($value) ? 0 : $value);
    }
    
    
    
    
}