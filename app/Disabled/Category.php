<?php

namespace App\Disabled;

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
    protected $table = 'disabled_categories';

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
    protected $fillable = ['name'];

    public function families()
    {
        return $this->hasMany('App\Disabled\FamilyDetail' , 'category_id');
    }

    public function relativeExchange()
    {
      return $this->hasMany('App\Disabled\RelativeExchange' , 'category_id');
    }


}
