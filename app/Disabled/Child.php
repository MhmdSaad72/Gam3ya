<?php

namespace App\Disabled;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Child extends Model
{
    use SoftDeletes;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'disabled_childrens';

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


    public function family()
    {
        return $this->belongsTo('App\Disabled\FamilyDetail' , 'family_id');
    }


    public function orphanSponser()
    {
        return $this->belongsTo('App\Disabled\OrphanSponser' , 'orphan_sponser_id');
    }

    public function disabled()
    {
        return $this->belongsTo('App\Disabled\Disabled' , 'disabled_id');
    }



    public function social_status(){
      if ($this->social_status == 0) {
        return 'أعزب';
      }elseif ($this->social_status == 1) {
        return 'متزوج';
      }else{
        return 'مطلق';
      }
    }


}
