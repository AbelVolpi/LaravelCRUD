<!DOCTYPE html>
<html>

<head>
    <title>Example Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <form method="post" action="{{ route('finish') }}">
                    {{ csrf_field() }}
                    <h2>Form Data:</h2>
                    <p><strong>Name:</strong> {{ $name }} </p>
                    <p><strong>Email:</strong> {{ $email }}</p>
                    <p><strong>Gender:</strong> {{ $gender }} </p>
                    <p><strong>Course:</strong> {{ $course }} </p>
                    <p><strong>Address:</strong> {{ $address }} </p>
                    <p><strong>CEP:</strong> {{ $cep }} </p>
                    <p><strong>City:</strong> {{ $city }} </p>
                    <p><strong>State:</strong> {{ $state }} </p>
                    <input type="hidden" value="{{ $name }}" name="name">
                    <div>
                        <input type="submit" name="save" value="save" class="btn btn-success"> </button>
                        <input type="submit" name="cancel" value="cancel" class="btn btn-info">  </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</body>

</html>
