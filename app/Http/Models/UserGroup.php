<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserGroup extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_groups';
    protected $guarded = [];
    public $timestamps = false;

    public function saveUserGroupData($data) {
    	if (empty($data)) {
    		$data = array();
    	}
    	return UserGroup::updateOrCreate($data);
    }

    public function fetchAll($query=null) {
    	return UserGroup::get();
    }
}