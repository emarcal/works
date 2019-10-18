<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TokenIco extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'tokens_ico';

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
    protected $fillable = ['tokenid', 'userid', 'orderid', 'price', 'amount', 'rate', 'btc_rate', 'btc_amount', 'btc_address', 'eth_address', 'url', 'api', 'ipn', 'status'];

    
}
