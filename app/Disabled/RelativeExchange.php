<?php

namespace App\Disabled;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use DB;
class RelativeExchange extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'disabled_relative_exchanges';

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


    public function category()
    {
      return $this->belongsTo('App\Disabled\Category' , 'category_id');
    }

    public function distribution_type()
    {
      if ($this->distribution_type == 0) {
        return 'عائلة';
      }elseif ($this->distribution_type == 1) {
        return 'طفل';
      }else {
        return 'اﻷطفال + 1';
      }
    }

    public function categoryName($id)
    {
      $category = Category::findOrFail($id);
      return $category->name ;
    }

    public function familyCost($id)
    {
      $family = FamilyDetail::findOrFail($id);
      $childCount = $family->children()->count();

      $quantity = $this->quantity ;
      $distrType = $this->distribution_type;

      if ($distrType == 0) {
        $cost = $quantity ;
      }elseif ($distrType == 1) {
        $cost = $childCount * $quantity ;
      }else {
        $cost = ($childCount + 1) * $quantity ;
      }
      return $cost ;
    }

    public function unitSearch($keyword)
    {
      $search = strtolower($keyword);
      if (strpos('قطعة' , $keyword) !== false ) {return $this->unit = 0 ;}
      elseif (strpos('كيلو' , $keyword) !== false ) {return $this->unit = 1 ;}
      else { return '';}
    }

    public function distrSearch($keyword)
    {
      $search = strtolower($keyword);
      if (strpos('عائلة' , $keyword) !== false ) {return $this->unit = 0 ;}
      elseif (strpos('طفل' , $keyword) !== false ) {return $this->unit = 1 ;}
      elseif (strpos('اﻷطفال + 1' , $keyword) !== false ) {return $this->unit = 2 ;}
      else { return '';}
    }

    public function checkedCondition()
    {
      $relative = DB::table('disabled_relative_costs')->where('relative_id' , $this->id)->where('checked' , 1)->get();
      return count($relative);
    }


}
