<!DOCTYPE html>
<html>
	<head>
		<title>create user</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

		<!-- Optional theme -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<!-- Latest compiled and minified JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
	</head>
	<body>
		<div class="col-md-12">
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/hierarchy')}}">List Users</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/create')}}">Add New User</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('group/list')}}">List Groups</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('group/save')}}">Add New Group</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/assign-group')}}">Assign group</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('permission/list')}}">List Permissions</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('permission/save')}}">Save Permissions</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/assign-permission')}}">Assign Permission</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/hierarchy')}}">View Hirarchy</a>
			</div>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<form class="col-md-12" action="{{url('user/save-group')}}" method="POST" accept-charset="UTF-8">
			<div class="form-group">
				<label for="exampleInputUser">User</label>
				<select class="form-control" name="user_id">
					@foreach ($users as $user)
				  		<option value="{{$user->id}}">{{$user->email}}</option>
					@endforeach
				</select>
			</div>
			<div class="form-group">
				<label for="exampleInputGroup">Group</label>
				<select class="form-control" name="group_id">
					@foreach ($groups as $group)
				  		<option value="{{$group->id}}">{{$group->name}}</option>
					@endforeach
				</select>
			</div>
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<button type="submit" class="btn btn-default">Save Group</button>
		</form>
		</div>
		<div class="col-md-3"></div>
	</body>
</html>