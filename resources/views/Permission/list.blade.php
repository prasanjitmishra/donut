<!DOCTYPE html>
<html>
<head>
	<title>User lists</title>
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
		<a href="{{url('group/create')}}">Add New Group</a>
		</div>
		<div class="col-md-2 btn btn-default">
		<a href="{{url('user/assign-group')}}">Assign group</a>
		</div>
		<div class="col-md-2 btn btn-default">
		<a href="{{url('permission/list')}}">List Permissions</a>
		</div>
		<div class="col-md-2 btn btn-default">
		<a href="{{url('user/assign-permission')}}">Assign Permission</a>
		</div>
		<div class="col-md-2 btn btn-default">
		<a href="{{url('user/create')}}">View Hirarchy</a>
		</div>
	</div>
	<div class="col-md-4"></div>
	<div class="col-md-4">
		<table class="table">
			<thead>
				<th>
					id
				</th>
				<th>
					Name
				</th>
			</thead>
			<tbody>
				@foreach ($permissions as $permission)
					<tr>
						<th>{{$permission->id}}</th>
						<th>{{$permission->permission}}</th>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<div class="col-md-4"></div>
</body>
</html>