<?php
    //echo ($_POST["nCity"]);
    //getting the URI
    if(array_key_exists('nCity',$_POST)){
        $url=file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$_POST['nCity']."&appid=c598920394a481f8677953fec87985d8");
        if(isset($url)) {
        $weatherArray=json_decode($url,true);
        $weatherText="<p>Weather in ".$_POST['nCity'].": ".$weatherArray['weather'][0]['description']."</p><p>Temperature:  ".$weatherArray['main']['temp']."k </p><p>Wind speed:".$weatherArray['wind']['speed']."</p>";}
    }
    //echo $ch;
    
    //echo strchr("Hello world bla bla!","world",true);
    
    
    
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    

    <title>Weather!</title>
    <style type="text/css">
        body{
            background: url(sky.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
        }
        .verticalCentering{
             position: absolute;
              top: 50%;
              left:50%;
              transform: translate(-50%,-50%);
        }
        .centerForm{
            margin: 0 auto;
        }
        .alert{
            margin: 0 auto;
            width: 400px;
        }
    </style>
  </head>
  <body>
    
      <div class="container text-center verticalCentering ">
    
                <form class="form-group" method="post">
                    <h1>Whats the weather?</h1>
                    
                    <p class="lead">enter the name of a city</p>
                    
                    <input type="text" class="form-control col-sm-6 centerForm " name="nCity" id="idcity">
                    <br>
                    
                    <p><button class="btn btn-primary" type="submit">Check!</button></p>
                     
                    <?php  if(array_key_exists('nCity',$_POST)){
    if(!$url) echo ' <div class="alert alert-danger " role="alert">This city do not exist !</div>'; else echo '<div class="alert alert-success " role="alert">'.$weatherText.'</div>'; }?>
                    
                    
                </form>
        </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
