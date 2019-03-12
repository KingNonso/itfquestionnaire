@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Have you benefited from ITF Services </div>
                <div class="card-body">
                    <div id="benefit-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Beneficiaries Statistics</h2>
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th>Response</th>
                          <th>Amount</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($benefit as $st => $s)
                        <tr>
                            <td>{{ $s->benefitted }}</td>
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
                <div class="card-header">How people have benefitted from the ITF? <span class="text-red">(Only showing none null responses)</span> </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                          <tr>
                            <th>Response</th>
                            <th>State</th>
                            <th>Education</th>
                            <th>Date</th>
                          </tr>
                        </thead>
                        <tbody>
                          @foreach ($details as $st => $s)
                          <tr>
                            <td>{{ $s->how_benefit }}</td>
                            <td>{{ $s->state }}</td>
                            <td>{{ $s->education }}</td>
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
                benefit_name = data.benefit_name
                benefit_total = data.benefit_total

                benefitChart()
            },
            error: function(error_data){
                console.log("error")
            }
        })

        function benefitChart(){
            var data = [{
                x: benefit_name,
                y: benefit_total,
                type: 'bar',
            }];
            var layout = {
                title: "People who have benefitted from ITF",

            };
            var stateDiv = document.getElementById('benefit-chart');

            Plotly.plot(stateDiv, data, layout)
        };

    })
</script>

@endsection
