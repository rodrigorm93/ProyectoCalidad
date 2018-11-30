@extends ('menu.utp')
@section ('contenido')

    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <div class="row">
        <div class = "col-lg-8 col-md-8 col-sm-8 col-xs-12">
            <h3>Estado Alumnado </h3>
            <!--Busqueda de alumnos-->
        </div>  
    </div>

    <div class="row">
        <div class = "col-xs-12">
            <div class="table-responsive">
                
                 <div class="card card-small py-3 mb-4 d-flex align-items-center">
        <canvas id="chart-area" width="425" height="212" class="chartjs-render-monitor" style="display: block; height: 170px; width: 340px;"></canvas>
        <script>
        var ctx = document.getElementById("chart-area").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: ["Reprobados","Aprobados","Pendiente"],
                datasets: [{
                    label: 'Pesos',
                    data: [{{$naprob}},{{$aprob}},{{$pa}}],
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
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
        </script>
  

        </div>

            </div>
            
        </div>
    </div>

@stop

