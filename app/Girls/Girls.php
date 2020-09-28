<?php

namespace App\Girls;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Girls extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'girls';

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
    protected $fillable = ['name', 'national_id', 'phone', 'birth_date', 'marriage_date', 'type', 'case'];


    public function getTypeAttribute($attribute)
    {
      return [
        '1' => 'فقراء',
        '0' => 'أيتام',
      ][$attribute];
    }


    public function getCaseAttribute($attribute)
    {
      return [
        '1' => 'أكبر من 18',
        '0' => 'أقل من 18',
      ][$attribute];
    }

    public function purchases()
    {
        return $this->hasMany('App\Girls\Purchase' , 'girl_id');
    }


}
