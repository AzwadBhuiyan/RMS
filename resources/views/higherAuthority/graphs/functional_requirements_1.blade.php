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


<body class="antialiased" style="background-color: rgb(232, 232, 255)">
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
    <h1 class="container">Semester Wise Revenue Report of {{ $school }}</h1>

    <div class="container my-5">

        <canvas id="myChart" style="width: 900px"></canvas>
    </div>
    <br>

    <table class="table table-striped container my-5 bg-white">
        <thead>
            <tr>
                <th scope="col">Semester</th>
                <th scope="col">Revenue</th>
                <th scope="col">Change in Revenue</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {{-- <th scope="row">1</th> --}}
                <td>{{ $semester1 }} {{ $year1 }}</td>
                <td>{{ $revenue1 }}</td>
                <td>{{ $revenueChange }}%</td>
            </tr>
            <tr>
                {{-- <th scope="row">2</th> --}}
                <td>{{ $semester2 }} {{ $year2 }}</td>
                <td>{{ $revenue2 }}</td>
                <td>{{ $revenueChange2 }}%</td>
            </tr>
        </tbody>
    </table>

    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: [
                    "{{ $semester1 }} {{ $y1 }}                          {{ $semester1 }} {{ $year1 }}",
                    "{{ $semester2 }} {{ $y2 }}                                 {{ $semester2 }} {{ $year2 }}"
                ],
                datasets: [{
                        label: 'Previous Semester',
                        data: [{{ $revenue1 }}, {{ $revenue3 }}],
                        backgroundColor: [
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                        ],
                        borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                            'rgba(255,99,132,1)',
                        ],
                        borderWidth: 1
                    },
                    {
                        label: 'Selected Semester',
                        data: [{{ $revenue2 }}, {{ $revenue4 }}],
                        backgroundColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderColor: [
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(54, 162, 235, 1)',
                        ],
                        borderWidth: 1
                    }
                ]
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
