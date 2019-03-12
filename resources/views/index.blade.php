<!DOCTYPE html>
<html lang="en">
<head>
  <title>ITF Questionnaire</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
</head>
<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">


<div class="jumbotron text-center">
<img src="{{ asset('img/itf_logo.png') }}" alt="ITF Logo" sizes="" srcset="">
  <h1>ITF</h1>
  <p>INDUSTRIAL TRAINING FUND</p>
</div>

<!-- Container (About Section) -->
<div id="about" class="container">
  <div class="row">
    <div class="col-sm-12">
        <div class="row text-center">
                <h2>FEDERAL REPUBLIC OF NIGERIA</h2>
            <h2 style="color:orangered">
                ASSESSMENT OF ITF CORPORATE IMAGE <br>
                QUESTIONNAIRE FOR GENERAL PUBLIC
            </h2>
            <p>
                This study seeks to assess the Corporate Image of the Industrial Training Fund. An honest response to these questions will be appreciated and treated as confidential. <br>
                Please complete the form below. Thank you.
            </p>
        </div>

        <?php

          function ng_states(){
            $app_states = array(
                array('id' => '2647','name' => 'Abia','country_id' => '160'),
                array('id' => '2648','name' => 'Abuja FCT','country_id' => '160'),
                array('id' => '2649','name' => 'Adamawa','country_id' => '160'),
                array('id' => '2650','name' => 'Akwa Ibom','country_id' => '160'),
                array('id' => '2651','name' => 'Anambra','country_id' => '160'),
                array('id' => '2652','name' => 'Bauchi','country_id' => '160'),
                array('id' => '2653','name' => 'Bayelsa','country_id' => '160'),
                array('id' => '2654','name' => 'Benue','country_id' => '160'),
                array('id' => '2655','name' => 'Borno','country_id' => '160'),
                array('id' => '2656','name' => 'Cross River','country_id' => '160'),
                array('id' => '2657','name' => 'Delta','country_id' => '160'),
                array('id' => '2658','name' => 'Ebonyi','country_id' => '160'),
                array('id' => '2659','name' => 'Edo','country_id' => '160'),
                array('id' => '2660','name' => 'Ekiti','country_id' => '160'),
                array('id' => '2661','name' => 'Enugu','country_id' => '160'),
                array('id' => '2662','name' => 'Gombe','country_id' => '160'),
                array('id' => '2663','name' => 'Imo','country_id' => '160'),
                array('id' => '2664','name' => 'Jigawa','country_id' => '160'),
                array('id' => '2665','name' => 'Kaduna','country_id' => '160'),
                array('id' => '2666','name' => 'Kano','country_id' => '160'),
                array('id' => '2667','name' => 'Katsina','country_id' => '160'),
                array('id' => '2668','name' => 'Kebbi','country_id' => '160'),
                array('id' => '2669','name' => 'Kogi','country_id' => '160'),
                array('id' => '2670','name' => 'Kwara','country_id' => '160'),
                array('id' => '2671','name' => 'Lagos','country_id' => '160'),
                array('id' => '2672','name' => 'Nassarawa','country_id' => '160'),
                array('id' => '2673','name' => 'Niger','country_id' => '160'),
                array('id' => '2674','name' => 'Ogun','country_id' => '160'),
                array('id' => '2675','name' => 'Ondo','country_id' => '160'),
                array('id' => '2676','name' => 'Osun','country_id' => '160'),
                array('id' => '2677','name' => 'Oyo','country_id' => '160'),
                array('id' => '2678','name' => 'Plateau','country_id' => '160'),
                array('id' => '2679','name' => 'Rivers','country_id' => '160'),
                array('id' => '2680','name' => 'Sokoto','country_id' => '160'),
                array('id' => '2681','name' => 'Taraba','country_id' => '160'),
                array('id' => '2682','name' => 'Yobe','country_id' => '160'),
                array('id' => '2683','name' => 'Zamfara','country_id' => '160')
              );
            $return = '';
            foreach($app_states as $h){
                $return .= '<option value="'.$h['name'].'">'.$h['name'].'</option>';

            }
            return $return;
          }

          function get_program(){
           echo '
                <option value="First School Leaving Certificate">First School Leaving Certificate</option>
                <option value="SSCE">SSCE</option>
                <option value="OND">OND</option>
                <option value="HND">HND</option>
                <option value="B. Sc.">B Sc.</option>
                <option value="B. Engr.">B. Engr.</option>
                <option value="PGD">PGD</option>
                <option value="MSc">MSc</option>
                <option value="PhD">PhD</option>
                <option value="Professorship">Professorship</option>
                <option value="Others">Others</option>
                ';
        }

        ?>

     <form action="/processor" method="post">
         @csrf
     <div class="row">
        <div class="col-sm-12 form-group">
          <label>State</label>
          <select name="state" id="state" class="form-control" style="max-width:50%;">
            <?php echo(ng_states()); ?>
          </select>
        </div>
        <div class="col-sm-12 form-group">
        <label for="education">Highest Level of Education</label>
        <select name="education" id="education" class="form-control" style="max-width:50%;" onchange="other_education(this);">
            <?php echo(get_program()); ?>
          </select>

          <div class="col-sm-12 form-group" id="other_edu" style="color:orangered">
            <label>Please Enter other Educational Qualification you might have? </label>
            <div class="row">
              <textarea class="form-control" name="other_edu" placeholder="Enter Highest Education Qualification" rows="2" style="max-width:50%;"></textarea><br>

            </div>
          </div>

        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 form-group">
          <label for="know">Do you know about Industrial Training Fund?</label>
          <select name="know" id="know" class="form-control" onchange="show_known(this);" style="max-width:50%;">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="col-sm-12 form-group" id="known" style="color:orangered">
          <label>How did you know about the ITF </label>
          <div class="row">
            <div class="col-sm-3">
              <label for="tv">
                <input type="checkbox" name="about[]" id="tv" value="Television">
                Television
              </label><br/>
              <label for="radio">
                <input type="checkbox" name="about[]" id="radio" value="Radio">
                Radio
              </label><br/>
              <label for="social">
                <input type="checkbox" name="about[]" id="social" value="Social Media">
                Social Media
              </label><br/>
              <label for="newspaper">
                <input type="checkbox" name="about[]" id="newspaper" value="Newspaper">
                Newspaper
              </label>
            </div>
            <div class="col-sm-9">
              <label for="personal">
                <input type="checkbox" name="about[]" id="personal" value="Personal Contact">
                Personal Contact (Friend/ Staff of ITF)
              </label><br/>
              <label for="flyers">
                <input type="checkbox" name="about[]" id="flyers" value="Flyers">
                Flyers
              </label><br/>
              <label for="billboards">
                <input type="checkbox" name="about[]" id="billboards" value="Bill boards">
                Bill boards
              </label><br/>
              <label for="bulletin">
                <input type="checkbox" name="about[]" id="bulletin" value="ITF bulletin">
                ITF bulletin
              </label>
            </div>
            <textarea class="form-control" id="others" name="others" placeholder="Others, please specify" rows="2" style="max-width:50%;"></textarea><br>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 form-group">
          <label for="serve">Are you aware of the services that Industrial Training Fund offers?</label>
          <select name="serve" id="serve" class="form-control" onchange="show_services(this);" style="max-width:50%;">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="col-sm-12 form-group" id="servers" style="color:orangered">
          <label>Check the Applicab  <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
            <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
            le services that you know about? </label>
          <div class="row">
            <div class="col-sm-3">
              <label for="training">
                <input type="checkbox" name="services[]" id="training" value="Training">
                Training Programme
              </label><br/>
              <label for="siwes">
                <input type="checkbox" name="services[]" id="siwes" value="SIWES">
                SIWES(IT)
              </label><br/>
              <label for="reimbursement">
                <input type="checkbox" name="services[]" id="reimbursement" value="Reimbursement">
                Reimbursement
              </label><br/>
              <label for="research">
                <input type="checkbox" name="services[]" id="research" value="Research">
                Research
              </label>
            </div>
            <div class="col-sm-9">
              <label for="consultancy">
                <input type="checkbox" name="services[]" id="consultancy" value="Consultancy">
                Consultancy
              </label><br/>
              <label for="advisory">
                <input type="checkbox" name="services[]" id="advisory" value="Advisory">
                Advisory
              </label><br/>
              <label for="nisdp">
                <input type="checkbox" name="services[]" id="nisdp" value="NISDP">
                NISDP
              </label><br/>
              <label for="csr">
                <input type="checkbox" name="services[]" id="csr" value="CSR">
                Corporate Social Responsibility
              </label>
            </div>

          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-sm-12 form-group">
          <label for="benefit">Have you benefited from ITF Services?</label>
          <select name="benefit" id="benefit" class="form-control" onchange="show_benefit(this);" style="max-width:50%;">
            <option value="No">No</option>
            <option value="Yes">Yes</option>
          </select>
        </div>
        <div class="col-sm-12 form-group" id="benefiter" style="color:orangered">
          <label>Please list any service you have benefited from? </label>
          <div class="row">
            <textarea class="form-control" id="my_benefit" name="my_benefit" placeholder="List services here, comma separated" rows="2" style="max-width:50%;"></textarea><br>

          </div>
        </div>
      </div>



      <div class="row">
        <div class="col-sm-12 form-group" style="max-width:50%;">
          <button class="btn btn-primary btn-block" type="submit">Submit</button>
        </div>
      </div>
     </form>

    </div>
  </div>
</div>



<footer class="container-fluid text-center">
  <a href="#myPage" title="To Top">
    <span class="glyphicon glyphicon-chevron-up"></span>
  </a>
  <p>Powered by   <a href="https://www.kingnonso.com" title="Visit Chinonso's Website">ICT Department. ITF HQ</a></p>
</footer>

<script>
  function show_known(val){
    if(val.value == 'Yes'){
      $('#known').show()
    }else{
      $('#known').hide()
    }
  }

  function show_services(val){
    if(val.value == 'Yes'){
      $('#servers').show()
    }else{
      $('#servers').hide()
    }
  }

  function show_benefit(val){
    if(val.value == 'Yes'){
      $('#benefiter').show()
    }else{
      $('#benefiter').hide()
    }
  }

  function other_education(val){
    if(val.value == 'Others'){
      $('#other_edu').show()
    }else{
      $('#other_edu').hide()
    }
  }

$(document).ready(function(){
  $('#known').hide()
  $('#servers').hide()
  $('#benefiter').hide()
  $('#other_edu').hide()



})
</script>

</body>
</html>
