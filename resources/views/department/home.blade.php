<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RMS</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

    </style>
</head>

<body class="antialiased" style="background-color: rgb(204, 204, 255)">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
        <a class="navbar-brand" href="#">
            <h4>Department</h4>
        </a>
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
                        <a class="dropdown-item" href="{{url('/')}}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    @error('successfull')
        <div class="alert alert-warning alert-dismissible fade show container text-success" role="alert">
            <strong>Successful!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror

    <form class="container shadow p-3 mb-5 bg-white rounded" action="{{ route('enroll_section') }}"
        enctype="multipart/form-data" method="POST">
        @csrf
        <h3 class="text-primary mt-1 text-center">Section Enrollment</h3>
        <br>
        <br>
        <div class="form-row my-4 ml-4">
            <div class="form-group col-md-4">
                <select id="inputState" class="form-control" name="semester">
                    <option selected disabled>Semester</option>
                    <option value="autumn">Autumn</option>
                    <option value="summer">Summer</option>
                    <option value="spring">Spring</option>
                </select>
            </div>

            <div class="form-group col-md-4">
                <select id="inputState" class="form-control" name="year">
                    <option selected disabled>Year</option>
                    @for ($i = 2009; $i <= 2022; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group col-md-4">
                <select id="inputState" name="section" class="form-control">
                    <option selected disabled>Section</option>
                    @for ($i = 1; $i <= 55; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
        <br>
        <br>
        <div class="form-row my-4 ml-4">
            <div class="form-group col-md-4">
                <input type="text" name="course_id" class="form-control" placeholder="Course ID">
            </div>

            <div class="form-group col-md-4">
                <input type="text" name="room_id" class="form-control" placeholder="Room ID">
            </div>

            <div class="form-group col-md-4">
                <input type="number" name="enrolled" min="0" max="100" class="form-control" placeholder="Enrolled">
            </div>
        </div>
        <br>
        <br>

        <h4 class="ml-4">Start Time:</h4>

        <div class="form-row my-4 ml-4">
            <div class="form-group col-sm-1">
                <select id="inputState" name="start_hour" class="form-control">
                    <option selected disabled>Hour</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group col-sm-2">
                <div class="form-group">
                    <select id="inputState" name="start_min" class="form-control">
                        <option selected disabled>Minutes</option>
                        <option value="00">00</option>
                        @for ($i = 1; $i < 60; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-2">
                <div class="form-group">
                    <select id="inputState" name="start_meridiem" class="form-control">
                        <option selected disabled>AM/PM</option>
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>

                    </select>
                </div>
            </div>
        </div>
        <br>
        <br>

        <h4 class="ml-4">End Time:</h4>

        <div class="form-row my-4 ml-4">
            <div class="form-group col-sm-1">
                <select id="inputState" name="end_hour" class="form-control">
                    <option selected disabled>Hour</option>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}">{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="form-group col-sm-2">
                <div class="form-group">
                    <select id="inputState" name="end_min" class="form-control">
                        <option selected disabled>Minutes</option>
                        @for ($i = 1; $i <= 60; $i++)
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endfor
                    </select>
                </div>
            </div>

            <div class="form-group col-sm-2">
                {{-- <input type="number" name="enrolled" class="form-control" placeholder="Enrolled"> --}}
                <div class="form-group">
                    <select id="inputState" name="end_meridiem" class="form-control">
                        <option selected disabled>AM/PM</option>
                        <option value="AM">AM</option>
                        <option value="PM">PM</option>

                    </select>
                </div>
            </div>
        </div>
        <br>
        <br>
        <div class="form-row mt-4 ml-4">
            <div class="form-group col-sm-2">
                <div class="form-group">
                    <select id="inputState" name="schedule" class="form-control">
                        <option selected disabled>Schedule</option>
                        <option value="MW">MW</option>
                        <option value="ST">ST</option>
                        <option value="F">F</option>
                        <option value="T">T</option>
                        <option value="R">R</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <div class="form-group">
                    <input type="text" name="faculty_full_name" class="form-control" placeholder="Faculty Full Name">
                </div>
            </div>
        </div>

        <button type="submit" class="btn btn-primary mt-2" style="margin-left: 45%">Add Data</button>
    </form>


</body>

</html>
