<?php

namespace App\QuranMemorization;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Date extends Model
{
  use SoftDeletes;
  /**
   * The database table used by the model.
   *
   * @var string
   */
  protected $table = 'dates';

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
  protected $fillable = ['days', 'time','teacher_id'];

  public function teacher()
  {
      return $this->belongsTo('App\QuranMemorization\Teacher' , 'teacher_id');
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
