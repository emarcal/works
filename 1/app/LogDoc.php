<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LogDoc extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'log_docs';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['description', 'user','old','doc','type', 'ip', 'date'];

    
}
