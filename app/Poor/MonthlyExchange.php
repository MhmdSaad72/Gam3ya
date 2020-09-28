<?php

namespace App\Poor;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;

class MonthlyExchange extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'poor_monthly_exchange';

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


    public function getMonthAttribute($attribute)
    {
      return [
        1 => 'يناير',
        2 => 'فبراير',
        3 => 'مارس',
        4 => 'أبريل',
        5 => 'مايو',
        6 => 'يونيو',
        7 => 'يوليو',
        8 => 'أغسطس',
        9 => 'سبتمبر',
        10 => 'أكتوبر',
        11 => 'نوفمبر',
        12 => 'ديسمبر',
      ][$attribute] ;
    }
    public function monthSearch($keyword)
    {
       if (strpos('يناير' , $keyword) !== false ) {return $this->month = 1 ;}
       elseif (strpos('فبراير' , $keyword) !== false) {return $this->month = 2;}
       elseif (strpos('مارس' , $keyword) !== false) {return $this->month = 3;}
       elseif (strpos('أبريل' , $keyword) !== false) {return $this->month = 4;}
       elseif (strpos('مايو' , $keyword) !== false) {return $this->month = 5;}
       elseif (strpos('يونيو' , $keyword) !== false) {return $this->month = 6;}
       elseif (strpos('يوليو' , $keyword) !== false) {return $this->month = 7;}
       elseif (strpos('أغسطس' , $keyword) !== false) {return $this->month = 8;}
       elseif (strpos('سبتمبر' , $keyword) !== false) {return $this->month = 9;}
       elseif (strpos('أكتوبر' , $keyword) !== false) {return $this->month = 10;}
       elseif (strpos('نوفمبر' , $keyword) !== false) {return $this->month = 11;}
       elseif (strpos('ديسمبر' , $keyword) !== false) {return $this->month = 12;}
       else {return '';}

    }

    public function checkedCondition()
    {
      $month = DB::table('poor_month_costs')->where('monthly_id' , $this->id)->where('checked' , 1)->get();
      return count($month);
    }


}
