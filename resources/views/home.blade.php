
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

        <div class="titulo">
            <h1 >Banco Cognox</h1>
            <input  type="submit" class="fadeIn fourth" id="logout" value="Logout">
        </div>


        <div class="opciones">
            <div class="jumbotron text-center col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3 float-md-center" id="transacciones">
            <h3>Transacciones</h3>      
            </div>

            <div class="jumbotron text-center col-lg-6 col-md-6 col-sm-6 col-xs-6 offset-3 float-md-center" id="estadocuenta"  data-toggle="collapse" data-target="#listacuentas">
                <h3>Estado de Cuenta</h3>      
            </div> 

            <div id="listacuentas" class="collapse col-lg-4">
                <h4>Estado de cuenta</h4>
                <div id="resultados">
                </div>
            </div>
        </div>

    



        <input type="hidden" id="cuenta" value="{{$id}}">
    


 

   


</body>
</html>

<script src="{{asset('public/pages/home.js')}}"></script>

<style>

    h1{
        margin:0;
    }
    .opciones{
    display:flex;
    align-items:center;
    flex-direction:column;
    }
    .titulo{
        display:flex;
        margin: 2% 0;
        justify-content:space-evenly;
    }
    .jumbotron{
        cursor: pointer;
    }

    body{
        background-color: #c3c1c1;
    }
    #listacuentas{
    border-style: solid;
   }
</style>