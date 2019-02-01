<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'groups';
    protected $guarded = [];
    public $timestamps = false;

    public function saveGroupData($data) {
    	if (empty($data)) {
    		$data = array();
    	}
    	return Group::updateOrCreate($data);
    }

    public function fetchAll($query=null) {
    	return Group::get();
    }
}