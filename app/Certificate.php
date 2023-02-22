<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'certificate';
    
    protected $fillable = [
          'consultation_id',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Certificate::observe(new UserActionsObserver);
    }
    
    public function consultation()
    {
        return $this->hasOne('App\Consultation', 'id', 'consultation_id');
    }


    
    
    
}