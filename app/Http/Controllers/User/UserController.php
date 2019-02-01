<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Models\User;
use App\Http\Models\Group;
use App\Http\Models\UserGroup;
use App\Http\Models\Permission;


class UserController extends Controller
{
    public function create(Request $request) {
		return view('User.create');
    }

    public function save(Request $request) {
    	$requesData = $request->all();

		if (empty($requesData['email'])) {
    		return redirect('user/create');
    	}

    	unset($requesData['_token']);
		$userModel = new User();
    	$result = $userModel->saveUserData($requesData);

    	if (empty($result)) {
    		return redirect('user/create');
    	}

		return redirect('user/list');
    }

    public function list(Request $request) {
        return redirect('user/hierarchy');
    }

    public function hierarchy(Request $request) {
        $userModel = new User();
        $hierarchy = $userModel->hierarchy($request->input('id'));
        return view('User.hierarchy')->with(array('hierarchy'=>$hierarchy));    
    }

    /**
     * assign group
     */
    public function assignGroup(Request $request) {
        $userModel = new User();
        $groupModel = new Group();
        $users = $userModel->fetchAll();
        $groups = $groupModel->fetchAll();
        return view('Group.assign')->with(array('users'=>$users,'groups'=>$groups)); 
    }

    /**
     * save assigned group
     */
    public function saveGroup(Request $request) {
        $requesData = $request->all();

        if (empty($requesData['user_id']) || empty($requesData['group_id'])) {
            return redirect('user/assign-group');
        }

        unset($requesData['_token']);
        $model = new UserGroup();
        $result = $model->saveUserGroupData($requesData);

        if (empty($result)) {
            return redirect('user/assign-group');
        }

        return redirect('user/hierarchy');
    }

    /**
     * assign permission
     */
    public function assignPermission(Request $request) {
        $userModel = new User();
        $permissionModel = new Permission();
        $users = $userModel->fetchAll();
        $permissions = $permissionModel->fetchAll();
        return view('Permission.assign')->with(array('users'=>$users,'permissions'=>$permissions)); 
    }

    /**
     * Save assigned permission
     */
    public function savePermission(Request $request) {
        if (empty($requesData['user_id']) || empty($requesData['permission_id'])) {
            return redirect('user/assign-permission');
        }

        unset($requesData['_token']);
        $model = new UserPermission();
        $result = $model->saveUserPermissionData($requesData);

        if (empty($result)) {
            return redirect('user/assign-permission');
        }

        return redirect('user/list');
    }
    /**
     * Assign manager
     */
    public function assignManager(Request $request) {
        $userModel = new User();
        $users = $userModel->fetchAll();
        return view('User.assign')->with(array('users'=>$users,'managers'=>$users)); 
    }

    /**
     * Save assigned manager
     */
    public function saveManager(Request $request) {
        if (empty($requesData['id']) || empty($requesData['manager'])) {
            return redirect('user/assign-permission');
        }

        unset($requesData['_token']);
        $model = new User();
        $result = $model->saveUserData($requesData);

        if (empty($result)) {
            return redirect('user/assign-permission');
        }

        return redirect('user/list');
    }

	// $userModel = new User();
	// $users = $userModel->fetchAll();
	// return view('User.list')->with(array('users'=>$users));
    // $userModel = new User();
    // $groupModel = new Group();
    // $users = $userModel->fetchAll();
    // $groups = $groupModel->fetchAll();
    //->with(array('users'=>$users,'groups'=>$groups));
}
