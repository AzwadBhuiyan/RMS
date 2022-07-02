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


<body class="antialiased" style="background-color: rgb(204, 204, 255)">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow p-3 mb-5 bg-white rounded">
        <a class="navbar-brand" href="#">
            <h4>Gigher Authority</h4>
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

    <div class="container">
        <a href="/bar" class="btn btn-primary mx-3">Bar Chart</a>
        <a href="/doubleBar" class="btn btn-primary mx-3">Double Bar Chart</a>
        <a href="/line" class="btn btn-primary mx-3">Line Chart</a>
        <a href="/pie" class="btn btn-primary mx-3">Pie Chart</a>
        <a href="/table" class="btn btn-primary mx-3">Table</a>
    </div>


    <form action="{{ route('show_Difference') }}" method="POST">
        @csrf
        <div class="container my-5">
            <select name="sem1">
                <option selected disabled value="NULL">Semester</option>
                <option value="autumn_">Autumn</option>
                <option value="summer_">Summer</option>
                <option value="spring_">Spring</option>
            </select>

            <select name="year1">
                <option selected disabled value="NULL">Year</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
            </select>

            <h5 class="my-3">Compared To:</h5>

            <select name="sem2">
                <option selected disabled value="NULL">Semester</option>
                <option value="autumn_">Autumn</option>
                <option value="summer_">Summer</option>
                <option value="spring_">Spring</option>
            </select>

            <select name="year2">
                <option selected disabled value="NULL">Year</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
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
    <br>

    <h1 class="container">functional_requirements_1</h1>

    <form action="{{ route('functional_requirements_1') }}" method="POST">
        @csrf
        <div class="container my-5">
            <select name="sem">
                <option selected disabled value="NULL">Semester</option>
                <option value="Autumn">Autumn</option>
                <option value="Summer">Summer</option>
                <option value="Spring">Spring</option>
            </select>

            <select name="year" required>
                <option selected disabled value="NULL">Year</option>
                {{-- <option value="2009">2009</option> --}}
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
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
    <br>

    <form action="{{ route('functional_requirements_4') }}" method="POST">
        @csrf
        <div class="container my-5">
            <select name="sem3">
                <option selected disabled value="NULL">Semester</option>
                <option value="autumn_2022">Autumn_2022</option>
                <option value="summer_2019">Summer_2019</option>
                <option value="spring_2021">Spring_2021</option>
            </select>

            <select name="year3">
                <option selected disabled value="NULL">No. Of Students</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
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
    <br>

    <form action="{{ route('functional_requirements_4') }}" method="POST">
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
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
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
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
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


    <form action="{{ route('functional_requirements_5') }}" method="POST">
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
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
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
                <option value="2009">2009</option>
                <option value="2010">2010</option>
                <option value="2011">2011</option>
                <option value="2012">2012</option>
                <option value="2013">2013</option>
                <option value="2014">2014</option>
                <option value="2015">2015</option>
                <option value="2016">2016</option>
                <option value="2017">2017</option>
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

    <div class="container">

        <canvas id="myChart" style="width: 900px"></canvas>
    </div>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["SLASS", "SELS", "SETS", ],
                datasets: [{
                    label: '# of Votes',
                    data: [{{ $sLass }}, {{ $sels }}, {{ $sets }}],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 206, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(255, 159, 64, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>

</html>
