@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">State</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id="state-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>State Statistics</h2>
                </div>

                <div class="card-body">



                    <table class="table table-striped">
                      <thead class="thead-dark">
                        <tr>
                          <th>State</th>
                          <th>Total</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach ($state as $st => $s)
                        <tr>
                            <td>{{ $s->state }}</td>
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
                <div class="card-footer">
                    <a href="{{ url('/education') }}" class="btn btn-primary btn-block">View Other Response</a>
                </div>

            </div>
        </div>
    </div>

    <br>
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
                <div class="card-footer">
                    <a href="{{ url('/knowledge') }}" class="btn btn-primary btn-block">View Other Response</a>
                </div>

            </div>
        </div>
    </div>

    <br>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Are you aware of the services that Industrial Training Fund offers? </div>
                <div class="card-body">
                    <div id="aware-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Awareness Knowledge Statistics</h2>
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
                        @foreach ($aware as $st => $s)
                        <tr>
                            <td>{{ $s->know_services }}</td>
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
                <div class="card-header">Check the Applicable services that you know about? </div>
                <div class="card-body">
                    <div id="check-chart"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h2>Awareness Statistics</h2>
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
                        @foreach ($how_aware as $st => $s)
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
                <div class="card-footer">
                    <a href="{{ url('/benefit') }}" class="btn btn-primary btn-block">View Benefit Details</a>
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

        var state = num = []
        var edu_name = edu_total = []
        var know_name = know_total = []
        var about_name = about_total = []
        var aware_name = aware_total = []
        var how_aware_name = how_aware_total = []
        var benefit_name = benefit_total = []

        $.ajax({
            method: "GET",
            url: endpoint,
            success: function(data){
                state = data.state
                num = data.total

                edu_name = data.edu_name
                edu_total = data.edu_total

                know_name = data.know_name
                know_total = data.know_total

                about_name = data.about_name
                about_total = data.about_total

                aware_name = data.aware_name
                aware_total = data.aware_total

                how_aware_name = data.how_aware_name
                how_aware_total = data.how_aware_total

                benefit_name = data.benefit_name
                benefit_total = data.benefit_total

                stateChart()
                educationChart()
                knowChart()
                aboutChart()
                awareChart()
                checkChart()
                benefitChart()
            },
            error: function(error_data){
                console.log("error")
            }
        })

        // Display chart
        function stateChart(){
            var data = [{
                x: state,
                y: num,
                type: 'bar',
            }];
            var layout = {
                title: "Statistic by State",

            };
            var stateDiv = document.getElementById('state-chart');

            Plotly.plot(stateDiv, data, layout)
        };
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

        function awareChart(){
            var data = [{
                x: aware_name,
                y: aware_total,
                type: 'bar',
            }];
            var layout = {
                title: "How Aware People are of the ITF",

            };
            var stateDiv = document.getElementById('aware-chart');

            Plotly.plot(stateDiv, data, layout)
        };

        function checkChart(){
            var data = [{
                x: how_aware_name,
                y: how_aware_total,
                type: 'bar',
            }];
            var layout = {
                title: "What People are Aware of about the ITF",

            };
            var stateDiv = document.getElementById('check-chart');

            Plotly.plot(stateDiv, data, layout)
        };

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
