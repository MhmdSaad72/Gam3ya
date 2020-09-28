<?php

namespace App\Student;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'students';

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
    protected $fillable = ['name', 'father_name', 'mother_name', 'national_id', 'father_national_id', 'mother_national_id', 'birth_date', 'school', 'band' , 'register'];


    public function relative_exchanges()
    {
        return $this->hasMany('App\Student\RelativeExchange' , 'student_id');
    }


}
