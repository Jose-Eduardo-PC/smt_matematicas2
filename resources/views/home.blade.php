@extends('layouts.admin_index')

<head>
    <title>Administracion</title>
</head>
@section('content')
    <div class="main-content" id="panel">
        <!-- Card stats -->
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('users.index') }}" class="card-link">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Usuarios Existentes</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $user }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                        <i class="ni ni-circle-08"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-lg-6">
                <a href="{{ route('themes.index') }}" class="card-link">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Temas Existentes</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $themeCount }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                        <i class="ni ni-books"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('activitys.index') }}" class="card-link">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Actividades Existentes</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $activity }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                        <i class="ni ni-book-bookmark"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="col-xl-3 col-md-6">
                <a href="{{ route('tests.index') }}" class="card-link">
                    <div class="card card-stats">
                        <!-- Card body -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title text-uppercase text-muted mb-0">Examenes Existentes</h5>
                                    <span class="h2 font-weight-bold mb-0">{{ $test }}</span>
                                </div>
                                <div class="col-auto">
                                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                        <i class="ni ni-single-copy-04"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </a>
        </div>
        <div class="card">
            <div class="card-header">
                <form action="/backup" method="GET">
                    <div>
                        <p>Un backup, también conocido como copia de seguridad, el backup se almacena en la carpeta
                            `storage/app` del proyecto.</p>
                        <button class="btn btn-primary" type="submit">Crear copia de seguridad</button>
                    </div>
                    <br>
                    <div>
                        <h3>Estado del backup</h3>
                        <p>{{ $status }}</p>
                        @if ($completedAt)
                            <p>Último backup completado en: {{ $completedAt }}</p>
                        @endif
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body custom">
                <div id="my_dataviz"></div>
            </div>
        </div>
        {{-- <!-- Table Themes  --> --}}
        <h2>Temas Nuevos</h2>
        <div class="card">
            <div class="card-header">
                <table id="table" class="table table align-items-center">
                    <thead class="thead-light">
                        <tr>
                            <th>Id</th>
                            <th>Temas</th>
                            <th>visitas</th>
                            <th>Likes</th>
                            <th>Opciones</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('table')
    <script>
        var columns = [{
                data: 'id'
            },
            {
                data: 'name_theme'
            },
            {
                data: 'total_visits'
            },
            {
                data: 'total_likes'
            },
            {
                data: 'btn',
                orderable: false,
                searchable: false
            }
        ];
        showTable('/api/temas-menu', columns);
    </script>
@endsection
@section('css')
    <style>
        .card-link {
            color: inherit;
            text-decoration: none;
        }


        .card-body.custom {
            padding: 1.25rem !important;
            /* Aumenta este valor para añadir más espacio interior */
            overflow: auto !important;
            /* Añade barras de desplazamiento si el contenido es demasiado grande */
        }

        .card-link:hover {
            color: inherit;
            text-decoration: none;
        }
    </style>
@endsection
@section('js')
    <script src="https://d3js.org/d3.v5.min.js"></script>
    <script>
        var temas = @json($temas);
        var margin = {
            top: 20,
            right: 20,
            bottom: 30,
            left: 40
        };
        var width = 1000 - margin.left - margin.right;
        var height = 600 - margin.top - margin.bottom;

        var svg = d3.select("#my_dataviz")
            .append("svg")
            .attr("width", width + margin.left + margin.right)
            .attr("height", height + margin.top + margin.bottom)
            .append("g")
            .attr("transform", "translate(" + margin.left + "," + margin.top + ")");

        var xScale = d3.scaleBand().range([0, width]).padding(0.1);
        var yScale = d3.scaleLinear().range([height, 0]);

        xScale.domain(temas.map(function(d) {
            return d.name_theme;
        }));
        yScale.domain([0, d3.max(temas, function(d) {
            return Math.max(d.total_visits, d.total_likes);
        })]);

        var barGroups = svg.selectAll("g")
            .data(temas)
            .enter().append("g")
            .attr("transform", function(d) {
                return "translate(" + xScale(d.name_theme) + ",0)";
            });

        barGroups.selectAll(".visit-rect")
            .data(function(d) {
                return [d];
            })
            .enter().append("rect")
            .attr("class", "visit-rect")
            .attr("width", xScale.bandwidth() / 2)
            .attr("y", function(d) {
                return yScale(d.total_visits);
            })
            .attr("height", function(d) {
                return height - yScale(d.total_visits);
            })
            .style("fill", "blue") // Cambia "blue" al color que desees para "Visitas"
            .each(function(d) {
                svg.append("text")
                    .attr("x", function() {
                        return xScale(d.name_theme) + xScale.bandwidth() / 4;
                    })
                    .attr("y", function() {
                        return yScale(d.total_visits) - 5;
                    })
                    .attr("text-anchor", "middle")
                    .text(d.total_visits)
                    .style("font-size", "20px") // Ajusta el tamaño de la fuente según lo necesites
                    .style("fill", "black"); // Ajusta el color del texto según lo necesites
            });

        barGroups.selectAll(".like-rect")
            .data(function(d) {
                return [d];
            })
            .enter().append("rect")
            .attr("class", "like-rect")
            .attr("width", xScale.bandwidth() / 2)
            .attr("x", xScale.bandwidth() / 2)
            .attr("y", function(d) {
                return yScale(d.total_likes);
            })
            .attr("height", function(d) {
                return height - yScale(d.total_likes);
            })
            .style("fill", "red") // Cambia "red" al color que desees para "Likes"
            .each(function(d) {
                svg.append("text")
                    .attr("x", function() {
                        return xScale(d.name_theme) + xScale.bandwidth() / 4 * 3;
                    })
                    .attr("y", function() {
                        return yScale(d.total_likes) - 5;
                    })
                    .attr("text-anchor", "middle")
                    .text(d.total_likes)
                    .style("font-size", "20px") // Ajusta el tamaño de la fuente según lo necesites
                    .style("fill", "black"); // Ajusta el color del texto según lo necesites
            });

        svg.append("g")
            .attr("transform", "translate(0," + height + ")")
            .call(d3.axisBottom(xScale));

        svg.append("g")
            .call(d3.axisLeft(yScale));

        var legend = svg.append("g")
            .attr("class", "legend")
            .attr("transform", "translate(" + (width - 40) + "," + (height - 520) + ")");

        legend.append("rect")
            .attr("width", 18)
            .attr("height", 18)
            .style("fill", "blue"); // Cambia "blue" al color que desees para "Visitas"

        legend.append("text")
            .attr("x", 24)
            .attr("y", 9)
            .attr("dy", ".35em")
            .text("Visitas");

        var legend2 = svg.append("g")
            .attr("class", "legend")
            .attr("transform", "translate(" + (width - 40) + "," + (height - 500) + ")");

        legend2.append("rect")
            .attr("width", 18)
            .attr("height", 18)
            .style("fill", "red"); // Cambia "red" al color que desees para "Likes"

        legend2.append("text")
            .attr("x", 24)
            .attr("y", 9)
            .attr("dy", ".35em")
            .text("Likes");
    </script>
@endsection
