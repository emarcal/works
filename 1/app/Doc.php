<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Doc extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'docs';

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
    protected $fillable = ['type', 'doc_id', 'doc_id_verse', 'doc_address', 'user', 'status_id',  'status_id_verse', 'status_address'];

    
}
