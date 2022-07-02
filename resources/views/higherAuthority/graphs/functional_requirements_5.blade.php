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

    <h1 class="container mb-5 text-center">Schedule Modification Report</h1>
    <br>
    <br>
    <h3 class="container">
        {{$semester1}}
    </h3>
    <table class="table table-striped container bg-white mb-5">
        <thead>
            <tr>
                <th scope="col">Class Size</th>
                <th scope="col">Sections</th>
                <th scope="col">Classroom 7</th>
                <th scope="col">Classroom 8</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $classSize }}</td>
                <td>{{ $section }}</td>
                <td>{{ round($totalClassroom7_1) }}</td>
                <td>{{ round($totalClassroom8_1) }}</td>
            </tr>
        </tbody>
    </table>

<br>
<br>
<br>
    <h3 class="container mt-5">
        {{$semester2}}
    </h3>
    <table class="table table-striped container bg-white mb-5">
        <thead>
            <tr>
                <th scope="col">Class Size</th>
                <th scope="col">Sections</th>
                <th scope="col">Classroom 7</th>
                <th scope="col">Classroom 8</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $classSize }}</td>
                <td>{{ $section2 }}</td>
                <td>{{ round($totalClassroom7_2) }}</td>
                <td>{{ round($totalClassroom8_2) }}</td>
            </tr>
        </tbody>
    </table>

    {{-- <div class="container">

        <canvas id="myChart" style="width: 900px"></canvas>
    </div> --}}

    <script>
        var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
        var yValues = [55, 49, 44, 24, 15];
        var barColors = [
            "#b91d47",
            "#00aba9",
            "#2b5797",
            "#e8c3b9",
            "#1e7145"
        ];

        new Chart("myChart", {
            type: "pie",
            data: {
                labels: xValues,
                datasets: [{
                    backgroundColor: barColors,
                    data: yValues
                }]
            },
            options: {
                title: {
                    display: true,
                    text: "Schedule Modification Report"
                }
            }
        });
    </script>
</body>

</html>
