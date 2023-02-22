<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;


use Illuminate\Database\Eloquent\SoftDeletes;

class Drug extends Model {

    use SoftDeletes;

    /**
    * The attributes that should be mutated to dates.
    *
    * @var array
    */
    protected $dates = ['deleted_at'];

    protected $table    = 'drug';
    
    protected $fillable = [
          'drugfamilly_id',
          'drugmaker_id',
          'alias',
          'description',
          'activated'
    ];
    

    public static function boot()
    {
        parent::boot();

        Drug::observe(new UserActionsObserver);
    }
    
    public function drugfamilly()
    {
        return $this->hasOne('App\Drugfamilly', 'id', 'drugfamilly_id');
    }


    public function drugmaker()
    {
        return $this->hasOne('App\Drugmaker', 'id', 'drugmaker_id');
    }


    
    
    
}