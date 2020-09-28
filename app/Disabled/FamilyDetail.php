<?php

namespace App\Disabled;

use DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyDetail extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'disabled_family_details';

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


    public function children()
    {
      return $this->hasMany('App\Disabled\Child' , 'family_id');
    }

    public function category()
    {
      return $this->belongsTo('App\Disabled\Category' , 'category_id');
    }

    public function familyCost()
    {
      $basic = Basic::first();
      if ($basic) {
        $basicCost = $basic->guarantee + $basic->addetion ;
        $childCount = $this->children()->count();
        if ($childCount > 0) {
          $allCost = $basicCost * ($childCount + 1);
        }else {
          $allCost = 'هذه العائلة لا تكفل أطفال';
        }
        return $allCost ;
      }
    }

    public function checked($id , $monthId)
    {
      $monthlyexchange = MonthlyExchange::findOrFail($monthId);
      $checkedValue = DB::table('disabled_month_costs')->where('family_id' , $id)->where('monthly_id' , $monthId)->pluck('checked')->toArray();
      if (count($checkedValue) == 0) {
        $checked = 0 ;
      }else {
        $checked = $checkedValue[0] ;
      }

      return $checked;
    }

    public function relativeChecked( $relativeId)
    {
      $relativeExchange = RelativeExchange::findOrFail($relativeId);
      $checkedValue = DB::table('disabled_relative_costs')->where('family_id' , $this->id)->where('relative_id' , $relativeId)->pluck('checked')->toArray();
      if (count($checkedValue) == 0) {
        $checked = 0 ;
      }else {
        $checked = $checkedValue[0] ;
      }

      return $checked;
    }

}
