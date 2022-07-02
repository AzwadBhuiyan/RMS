<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RMS</title>

    <!-- Fonts -->
    {{-- <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet"> --}}

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="antialiased" style="background-color: rgb(204, 153, 255)">

    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
        <a class="navbar-brand" href="#">ADMIN</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <!-- Example single danger button -->

            </ul>
            <div class="form-inline my-2 my-lg-0">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        Action
                    </button>
                    <div class="dropdown-menu">
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="/">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @error('successfull')
        <div class="alert alert-warning alert-dismissible fade show container text-success" role="alert">
            <strong>Account has been successfully created.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror




    <form class="container mt-5 shadow-lg p-3 mb-5 bg-white rounded" action="{{ route('create_user') }}"
        method="POST">
        @csrf
        <div class="form-row my-4 ml-4">
            <div class="form-group col-md-6">
                <label for="inputCity">User ID (auto generated)</label>
                <input type="text" value="{{ $id }}" class="form-control" id="inputCity" disabled>
                <input type="hidden" value="{{ $id }}" name="id" class="form-control" id="inputCity">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Select User Type</label>
                <select name="type" id="inputState" class="form-control">
                    <option selected disabled>.....</option>
                    {{-- <option>Admin</option> --}}
                    <option value="d">Department</option>
                    <option value="h">Higher Authority</option>
                </select>
            </div>
        </div>

        <div class="form-row ml-4">
            <div class="form-group col-md-5">
                {{-- <label for="inputEmail4">First Name</label> --}}
                <input type="text" class="form-control" id="inputEmail4" name="fname" placeholder="First Name">
            </div>
            <div class="form-group col-md-5">
                {{-- <label for="inputPassword4">Last Name</label> --}}
                <input type="text" class="form-control" id="inputPassword4" name="lname" placeholder="Last Name">
            </div>
        </div>

        <div class="form-row mt-2 ml-4">
            <div class="form-group col-md-5">
                <label>Password: 1234</label>
                <input name="password" value="1234" type="hidden" class="form-control">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-4 ml-4">Create User</button>
    </form>


    {{-- <form action="{{ route('create_user') }}" method="POST">
        @csrf
        <select name="userType" required>
            <option selected disabled>Select User</option>
            <option value="admin">Admin</option>
            <option value="department">Department</option>
            <option value="higherAuthority">Higher Authority</option>
        </select>
        <br>
        <br>
        <input type="text" name="id" placeholder="Enter User ID" required>
        <br>
        <br>
        <input type="text" name="fName" placeholder="First Name" required>
        <input type="text" name="lName" placeholder="Last Name" required>
        <br>
        <br>
        <label for="pass">Password</label>
        <input type="text" value="1234" name="password">
        <br>
        <br>
        <input type="submit" value="Create User">
    </form> --}}


</body>

</html>
