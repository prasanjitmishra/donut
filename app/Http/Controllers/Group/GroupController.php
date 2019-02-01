<?php

namespace App\Http\Controllers\Group;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Models\Group;

class GroupController extends Controller
{
    public function create(Request $request) {
		return view('Group.create'); 
    }

    public function save(Request $request) {
    	$requesData = $input = $request->all();

		if (empty($requesData['name'])) {
    		return redirect('group/create');
    	}

    	unset($requesData['_token']);
		$model = new Group();
    	$result = $model->saveGroupData($requesData);

    	if (empty($result)) {
    		return redirect('group/create');
    	}

		return redirect('group/list');
    }

    public function list(Request $request) {
    	$model = new Group();
    	$groups = $model->fetchAll();

    	return view('Group.list')->with(array('groups'=>$groups));
    }
}
