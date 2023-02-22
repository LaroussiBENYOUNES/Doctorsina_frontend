<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Response extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'response';
    
    protected $fillable = [
          'question_id',
          'consultation_id',
          'patient_response'
         // 'accepted'
    ];
    

    public static function boot()
    {
        parent::boot();

        Response::observe(new UserActionsObserver);
    }
    
    public function question()
    {
        return $this->hasOne('App\Question', 'id', 'question_id');
    }


    public function consultation()
    {
        return $this->hasOne('App\Consultation', 'id', 'consultation_id');
    }


    
    
    
}