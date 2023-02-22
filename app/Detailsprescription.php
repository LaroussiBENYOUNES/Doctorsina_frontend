<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Detailsprescription extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'detailsprescription';
    
    protected $fillable = [
          'prescription_id',
          'drug_id',
          'dose',
          'duration'
    ];
    

    public static function boot()
    {
        parent::boot();

        Detailsprescription::observe(new UserActionsObserver);
    }
    
    public function prescription()
    {
        return $this->hasOne('App\Prescription', 'id', 'prescription_id');
    }


    public function drug()
    {
        return $this->hasOne('App\Drug', 'id', 'drug_id');
    }


    
    
    
}