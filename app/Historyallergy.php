<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Historyallergy extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'historyallergy';
    
    protected $fillable = [
          'user_id',
          'allergy_id',
          'begginningdate',
          'enddate'
    ];
    

    public static function boot()
    {
        parent::boot();

        Historyallergy::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    public function allergy()
    {
        return $this->hasOne('App\Allergy', 'id', 'allergy_id');
    }


    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setBegginningdateAttribute($input)
    {
        if($input != '') {
            $this->attributes['begginningdate'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['begginningdate'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getBegginningdateAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }

/**
     * Set attribute to date format
     * @param $input
     */
    public function setEnddateAttribute($input)
    {
        if($input != '') {
            $this->attributes['enddate'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['enddate'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getEnddateAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }


    
}