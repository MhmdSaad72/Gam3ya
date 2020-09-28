<?php

namespace App;

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
    protected $table = 'childrens';

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
        return $this->belongsTo('App\FamilyDetail' , 'family_id');
    }


    public function orphanSponser()
    {
        return $this->belongsTo('App\OrphanSponser' , 'orphan_sponser_id');
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
