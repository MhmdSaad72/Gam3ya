<?php

namespace App\Mosque;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mosque extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mosques';

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
    protected $fillable = ['name', 'address', 'code'];


    public function workers()
    {
        return $this->hasMany('App\Mosque\Worker' , 'mosque_id');
    }

    public function costs()
    {
        return $this->hasMany('App\Mosque\Cost' , 'mosque_id');
    }

    public function incomes()
    {
        return $this->hasMany('App\Mosque\Incoming' , 'mosque_id');
    }


}
