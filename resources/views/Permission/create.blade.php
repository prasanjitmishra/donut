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
				<a href="{{url('user/list')}}">List Users</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/create')}}">Add New User</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('group/list')}}">List Groups</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('group/list')}}">Add New Group</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/assign-group')}}">Assign group</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/create')}}">List Permissions</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/create')}}">Assign Permission</a>
			</div>
			<div class="col-md-2 btn btn-default">
				<a href="{{url('user/create')}}">View Hirarchy</a>
			</div>
		</div>
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<form class="col-md-12" action="{{url('group/save')}}" method="POST" accept-charset="UTF-8">
			<div class="form-group">
				<label for="exampleInputName1">Permission Name</label>
				<input name="permission" type="text" class="form-control" id="exampleInputName1" placeholder="Permission Name">
			</div>
			<input name="_token" type="hidden" value="{{ csrf_token() }}"/>
			<button type="submit" class="btn btn-default">Add Permission</button>
		</form>
		</div>
		<div class="col-md-3"></div>
	</body>
</html>