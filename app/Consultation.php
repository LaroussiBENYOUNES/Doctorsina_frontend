<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Consultation extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'consultation';
    
    protected $fillable = [
          'appoitement_id',
          'report_id',
          'visitnature_id',
          'visitstatus_id',
          'visittype_id',
          'date',
          'time'
    ];
    

    public static function boot()
    {
        parent::boot();

        Consultation::observe(new UserActionsObserver);
    }
    
    public function appoitement()
    {
        return $this->hasOne('App\Appoitement', 'id', 'appoitement_id');
    }

    public function report()
    {
        return $this->hasOne('App\Report', 'id', 'report_id');
    }

    public function visitnature()
    {
        return $this->hasOne('App\Visitnature', 'id', 'visitnature_id');
    }

    public function visitstatus()
    {
        return $this->hasOne('App\Visitstatus', 'id', 'visitstatus_id');
    }

    public function visittype()
    {
        return $this->hasOne('App\Visittype', 'id', 'visittype_id');
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