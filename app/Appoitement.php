<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Appoitement extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'appoitement';
    
    protected $fillable = [
          'medicalstructure_id',
          'patient_id',
          'doctor_id',
          'date',
          'time',
          'confirmed'
    ];
    

    public static function boot()
    {
        parent::boot();

        Appoitement::observe(new UserActionsObserver);
    }
    
    public function medicalstructure()
    {
        return $this->hasOne('App\MedicalStructure', 'id', 'medicalstructure_id');
    }


    public function patient()
    {
        return $this->hasOne('App\Patient', 'id', 'patient_id');
    }


    public function doctor()
    {
        return $this->hasOne('App\Doctor', 'id', 'doctor_id');
    }


    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDateAttribute($input)
    {
        if($input != '') {
            $this->attributes['date'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['date'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDateAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }


    
}