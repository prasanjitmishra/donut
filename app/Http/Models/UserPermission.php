<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class UserPermission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_permissions';
    protected $guarded = [];
    public $timestamps = false;

    public function saveUserPermissionData($data) {
    	if (empty($data)) {
    		$data = array();
    	}
    	return UserPermission::updateOrCreate($data);
    }

    public function fetchAll($query=null) {
    	return UserPermission::get();
    }
}