<?php

namespace App\Poor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'poor_categories';

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
    protected $guarded = [];

    public function families()
    {
        return $this->hasMany('App\Poor\FamilyDetail' , 'category_id');
    }

    public function relativeExchange()
    {
      return $this->hasMany('App\Poor\RelativeExchange' , 'category_id');
    }


}
