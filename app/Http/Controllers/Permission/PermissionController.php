<?php

namespace App\Http\Controllers\Permission;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Models\Group;
use App\Http\Models\Permission;

class PermissionController extends Controller
{
    public function create(Request $request) {
		return view('Permission.create'); 
    }

    public function save(Request $request) {
    	$requesData = $request->all();

		if (empty($requesData['permission'])) {
    		return redirect('permission/create');
    	}

    	unset($requesData['_token']);
		$model = new Permission();
    	$result = $model->savePermissionData($requesData);

    	if (empty($result)) {
    		return redirect('permission/create');
    	}

		return redirect('permission/list');
    }

    public function list(Request $request) {
    	$model = new Permission();
    	$permissions = $model->fetchAll();
    	return view('Permission.list')->with(array('permissions'=>$permissions));
    }
}
