@extends('layouts.plantilla')
@section('contenido')

<div class=" bg-white p-4">
  <div class="card ">
    <div class="card-header">
      <h2 class="font-weight-bold">GRAFICO: VECES COMPRADA UN PRODUCTO</h2>
    </div>
    <!-- /.card-header -->
    <div class="card-body" style="overflow: hidden;">
      
      <canvas id="myChart" width="400" height="200"></canvas>
      
    </div>
    <!-- /.card-body -->
  </div>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.3/dist/Chart.min.js"></script>
  <script>
    var ctx = document.getElementById('myChart').getContext('2d');
      var myChart = new Chart(ctx, {
          type: 'bar',
          data: {
            
              labels: [
                @foreach($registros as $reg)
                    ' {{$reg->producto}} ',
                     @endforeach
                ],
              datasets: [{
                  label: 'VECES COMPRADAS',
                  data: [
                    @foreach($registros as $reg)
                    ' {{$reg->VecesCompradas}} ',
                     @endforeach
                    
                    ],
                  backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'
                  ],
                  borderColor: [
                      'rgba(255, 99, 132, 1)',
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
                          beginAtZero: true
                      }
                  }]
              }
          }
      });
  </script>

  @stop