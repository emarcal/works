<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleLogin extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'model_has_roles';

    /**
    * The database primary key value.
    *
    * @var string
    */


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['role_id','model_id'];

    
}
