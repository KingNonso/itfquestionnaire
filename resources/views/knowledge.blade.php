@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Do you know about Industrial Training Fund? </div>
                <div class="card-body">
                    <div id="know-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Knowledge Statistics</h2>
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
                        @foreach ($knowledge as $st => $s)
                        <tr>
                            <td>{{ $s->know_itf }}</td>
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
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">How did you know about the ITF </div>
                <div class="card-body">
                    <div id="about-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>About Knowledge Statistics</h2>
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
                        @foreach ($how_know as $st => $s)
                        <tr>
                            <td>{{ $s->item }}</td>
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
                <div class="card-header">Other means how people know the ITF? <span class="text-red">(Only showing none null responses)</span> </div>
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
                            <td>{{ $s->know_itf_others }}</td>
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

        var know_name = know_total = []
        var about_name = about_total = []

        $.ajax({
            method: "GET",
            url: endpoint,
            success: function(data){
                know_name = data.know_name
                know_total = data.know_total

                about_name = data.about_name
                about_total = data.about_total

                knowChart()
                aboutChart()
            },
            error: function(error_data){
                console.log("error")
            }
        })

        function knowChart(){
            var data = [{
                x: know_name,
                y: know_total,
                type: 'bar',
            }];
            var layout = {
                title: "Knowledge About ITF",

            };
            var stateDiv = document.getElementById('know-chart');

            Plotly.plot(stateDiv, data, layout)
        };

        function aboutChart(){
            var data = [{
                x: about_name,
                y: about_total,
                type: 'bar',
            }];
            var layout = {
                title: "How People Know About ITF",

            };
            var stateDiv = document.getElementById('about-chart');

            Plotly.plot(stateDiv, data, layout)
        };


    })
</script>

@endsection
