@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Highest Level of Education</div>

                <div class="card-body">
                    <div id="education-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Education Statistics</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th>Qualification</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($education as $st => $s)
                        <tr>
                            <td>{{ $s->education }}</td>
                            <td>{{ $s->total }}</td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <br>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Other Responses <span class="text-red">(Only showing none null responses)</span> </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>Response</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($details as $st => $s)
                          <tr>
                            <td>{{ $s->item }}</td>
                            <td>{{ $s->created_at }}</td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>


</div>
<script src="{{ asset('js/plotly.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>

<script>

    $(document).ready(function(){
        var endpoint = '/state-chart/'

        var benefit_name = benefit_total = []

        $.ajax({
            method: "GET",
            url: endpoint,
            success: function(data){
                edu_name = data.edu_name
                edu_total = data.edu_total

                educationChart()
            },
            error: function(error_data){
                console.log("error")
            }
        })

        function educationChart(){
            var data = [{
                x: edu_name,
                y: edu_total,
                type: 'bar',
            }];
            var layout = {
                title: "Statistic for Education",

            };
            var stateDiv = document.getElementById('education-chart');

            Plotly.plot(stateDiv, data, layout)
        };

    })
</script>

@endsection
