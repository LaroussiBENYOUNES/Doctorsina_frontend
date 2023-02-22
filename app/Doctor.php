<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Doctor extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'doctor';
    
    protected $fillable = [
          'fullname',
          'user_id',
          'country_id',
          'speciality_id',
          'birthday',
          'gender',
          'codecnam',
          'matricule',
          "with_administrator_option",
          'activated',
          'signaled'
    ];
    

    public static function boot()
    {
        parent::boot();

        Doctor::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    public function country()
    {
        return $this->hasOne('App\Country', 'id', 'country_id');
    }


    public function speciality()
    {
        return $this->hasOne('App\Speciality', 'id', 'speciality_id');
    }


    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBirthdayAttribute($input)
    {
        if($input != '') {
            $this->attributes['birthday'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['birthday'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBirthdayAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }


    
}