<?php

namespace App\QuranMemorization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teacher extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'teachers';

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
    protected $fillable = ['name', 'phone', 'mosque', 'days', 'time' , 'rewards'];


    public function boys()
    {
        return $this->hasMany('App\QuranMemorization\Boy' , 'teacher_id');
    }

    public function dates()
    {
        return $this->hasMany('App\QuranMemorization\Date' , 'teacher_id');
    }


    public function getDaysAttribute($attribute)
    {
      return [
        1 => 'الاثنين',
        2 => 'الثلاثاء',
        3 => 'الاربعاء',
        4 => 'الخميس',
        5 => 'الجمعة',
        6 => 'السبت',
        7 => 'الاحد',
      ][$attribute] ;
    }


}
