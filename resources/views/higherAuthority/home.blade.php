<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RMS</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>

    <script src="./js/Chart.js"></script>
    <script src="./js/jquery.min.js"></script>


</head>


<body class="antialiased" style="background-color: rgb(235, 235, 251)">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
        <a class="navbar-brand" href="#">
            <h4>Higher Authority</h4>
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
                        <a class="dropdown-item" href="{{ url('/') }}">Logout</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    {{-- <div class="container">
        <a href="/bar" class="btn btn-primary mx-3">Bar Chart</a>
        <a href="/doubleBar" class="btn btn-primary mx-3">Double Bar Chart</a>
        <a href="/line" class="btn btn-primary mx-3">Line Chart</a>
        <a href="/pie" class="btn btn-primary mx-3">Pie Chart</a>
        <a href="/table" class="btn btn-primary mx-3">Table</a>
    </div> --}}


    <h1 class="container mt-5">Semester Wise Revenue Report</h1>

    <form class="container shadow p-3 mb-5 bg-white rounded" action="{{ route('functional_requirements_1') }}" method="POST">
        @csrf
        <div class="container my-5">
            <select name="selectedSchool" required>
                <option selected disabled value="NULL">Select School</option>
                <option value="SETS">SETS</option>
                <option value="SBE">SBE</option>
                <option value="SLASS">SLASS</option>
                <option value="SELS">SELS</option>

            </select>
            <br>
            <br>
            <select name="sem" required>
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year" required>
                <option selected disabled value="NULL">Year</option>


                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>

            &nbsp;&nbsp;&nbsp;

            <select name="sem2" required>
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year2" required>
                <option selected disabled value="NULL">Year</option>

                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>


            <br>
            <br>

            <input type="submit" value="Generate">
            <br>
            @error('exist')
                <strong class="text-danger font-weight-bold">No data was found!</strong>
            @enderror
        </div>
    </form>

    <br>
    <br>
    <h1 class="container">Section Allotment Report</h1>

    <form class="container shadow p-3 mb-5 bg-white rounded" action="{{ route('functional_requirements_2') }}" method="POST">
        @csrf

        <div class="container my-5">
            <div class="form-group col-md-5">
                <input type="int" name=givenNumber class="form-control" id="givenNumber" placeholder="Enter number">
            </div>
            <br>
            <br>
            <select name="sem" required>
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year" required>
                <option selected disabled value="NULL">Year</option>

                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>

            &nbsp;&nbsp;&nbsp;




            <br>
            <br>

            <input type="submit" value="Generate">
            <br>
            @error('exist')
                <strong class="text-danger font-weight-bold">No data was found!</strong>
            @enderror
        </div>
    </form>

    <br>
    <br>




    <h1 class="container">Comparative Analysis Of Unsused Resources</h1>

    <form  class="container shadow p-3 mb-5 bg-white rounded" action="{{ route('functional_requirements_3') }}" method="POST">
        @csrf
        <div class="container my-5">
            <select name="sem" required>
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year" required>
                <option selected disabled value="NULL">Year</option>

                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>

            &nbsp;&nbsp;&nbsp;

            <br>
            <br>

            <input type="submit" value="Generate">
            <br>
            @error('exist')
                <strong class="text-danger font-weight-bold">No data was found!</strong>
            @enderror
        </div>
    </form>

    <br>

    <br>


    <h1 class="container">Class Size Distribution Report</h1>




    <form  class="container shadow p-3 mb-5 bg-white rounded" action="{{ route('functional_requirements_4') }}" method="POST">
        @csrf
        <div class="container my-5">
            <select name="sem" required>
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year" required>
                <option selected disabled value="NULL">Year</option>

                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>

            &nbsp;&nbsp;&nbsp;

            <select name="sem2" required>
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year2" required>
                <option selected disabled value="NULL">Year</option>

                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>


            <br>
            <br>
            Class Size
            <br>
            <input type="number" min="0" max="100" name="classSize1" placeholder="" required>
            -to-
            <input type="number" min="0" max="100" name="classSize2" placeholder="" required>
            <br>
            <br>
            <input type="submit" value="Generate">
            <br>
            @error('exist')
                <strong class="text-danger font-weight-bold">No data was found!</strong>
            @enderror
        </div>
    </form>

    <br>
    <br>
    <br>

    <h1 class="container">Schedule Modification Report</h1>
    <form  class="container shadow p-3 mb-5 bg-white rounded" action="{{ route('functional_requirements_5') }}" method="POST">
        @csrf
        <div class="container my-5">
            <select name="sem" required>
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year" required>
                <option selected disabled value="NULL">Year</option>

                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>

            &nbsp;&nbsp;&nbsp;

            <select name="sem2" required>
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year2" required>
                <option selected disabled value="NULL">Year</option>

                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
            </select>


            <br>
            <br>
            Class Size
            <br>
            <input type="number" min="0" max="100" name="classSize1" placeholder="" required>
            -to-
            <input type="number" min="0" max="100" name="classSize2" placeholder="" required>
            <br>
            <br>
            <input type="submit" value="Generate">
            <br>
            @error('exist')
                <strong class="text-danger font-weight-bold">No data was found!</strong>
            @enderror
        </div>
    </form>


</body>

</html>
