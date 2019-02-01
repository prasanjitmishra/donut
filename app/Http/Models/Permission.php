<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'permissions';
    protected $guarded = [];
    public $timestamps = false;

    public function savePermissionData($data) {
    	if (empty($data)) {
    		$data = array();
    	}
        print_r($data);
        die();
    	return Permission::updateOrCreate($data);
    }

    public function fetchAll($query=null) {
    	return Permission::get();
    }
}