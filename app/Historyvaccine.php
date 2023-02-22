<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;

use Carbon\Carbon; 

use Illuminate\Database\Eloquent\SoftDeletes;

class Historyvaccine extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'historyvaccine';
    
    protected $fillable = [
          'user_id',
          'vaccine_id',
          'datevaccin',
          'nbr'
    ];
    
    public static $nbr = ["" => ""];


    public static function boot()
    {
        parent::boot();

        Historyvaccine::observe(new UserActionsObserver);
    }
    
    public function user()
    {
        return $this->hasOne('App\User', 'id', 'user_id');
    }


    public function vaccine()
    {
        return $this->hasOne('App\Vaccine', 'id', 'vaccine_id');
    }


    
    /**
     * Set attribute to date format
     * @param $input
     */
    public function setDatevaccinAttribute($input)
    {
        if($input != '') {
            $this->attributes['datevaccin'] = Carbon::createFromFormat(config('quickadmin.date_format'), $input)->format('Y-m-d');
        }else{
            $this->attributes['datevaccin'] = '';
        }
    }

    /**
     * Get attribute from date format
     * @param $input
     *
     * @return string
     */
    public function getDatevaccinAttribute($input)
    {
        if($input != '0000-00-00') {
            return Carbon::createFromFormat('Y-m-d', $input)->format(config('quickadmin.date_format'));
        }else{
            return '';
        }
    }


    
}