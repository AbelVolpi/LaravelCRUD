<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<div class="container my-5">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<form method="post" action="{{ route('confirmation_data') }}">
					{{ csrf_field() }}
					<div class="form-group">
						<label for="name">Name</label>
						<input type="text" class="form-control" id="name" name="name" placeholder="Enter your name">
					</div>

					<div class="form-group">
						<label for="email">Email</label>
						<input type="email" class="form-control" id="email" name="email" placeholder="Enter your email">
					</div>

					<div class="form-group">
						<label for="gender">Gender</label>
						<select class="form-control" id="gender" name="gender">
							<option>Male</option>
							<option>Female</option>
							<option>Other</option>
						</select>
					</div>

					<div class="form-group">
						<label for="course">Course</label>
						<input type="text" class="form-control" id="course" placeholder="Enter your course" name="course">
					</div>

					<div class="form-group">
						<label for="address">Address</label>
						<input type="text" class="form-control" id="address" placeholder="Enter your address" name="address">
					</div>

					<div class="form-group">
						<label for="cep">CEP</label>
						<input type="text" class="form-control" id="cep" placeholder="Enter your CEP" name="cep">
					</div>

					<div class="form-group">
						<label for="city">City</label>
						<input type="text" class="form-control" id="city" placeholder="Enter your city" name="city">
					</div>

					<div class="form-group">
						<label for="state">State</label>
						<input type="text" class="form-control" id="state" placeholder="Enter your state" name="state">
					</div>

					<button type="submit" class="btn btn-primary">Submit</button>

				</form>
			</div>
		</div>
	</div>

<body>
