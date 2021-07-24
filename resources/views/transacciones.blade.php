<!DOCTYPE html>
<html lang="en">
<head>
  <title>Transacciones</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap-theme.min.css" integrity="sha384-6pzBo3FDv/PJ8r2KRkGHifhEocL+1X2rVCTTkUfGk7/0pbek5mMa1upzvWbrUbOZ" crossorigin="anonymous">

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>



<script type="text/javascript" src="https://cdn.datatables.net/v/bs4-4.6.0/jq-3.3.1/dt-1.10.25/datatables.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.6.0/js/bootstrap.min.js"></script>


</head>
<body>




  <div class="container">

        <div class="titulo">
            <h1 id="titulo" >Banco Cognox</h1>
            <input  type="submit" class="fadeIn fourth" id="logout" value="Logout">
        </div>

      <div class="jumbotron text-center col-lg-4 col-md-6 col-sm-6 col-xs-6 offset-3 float-md-center" id="transacciones" data-toggle="collapse" data-target="#cuentaspropias">
          <h3 data-toggle="collapse" data-target="#cuentaspropias" >Transferencia a cuentas propias</h3>      
      </div>

      <div id="cuentaspropias" class="collapse col-lg-4">
        <div id='mostrar1'>
            <h4>Cuenta Origen:</h4>
            <select class="custom-select" id="cuentaa">
            </select> 
            <h4>Cuenta Destino:</h4>
            <select class="custom-select" id="cuentab">
            </select> 
            <h4>Monto:</h4>
            <input type="number"  placeholder="monto" id="montoa">
            <input type="submit" class="fadeIn fourth" id="transferira" value="Transferir">
        </div>

        <div id='error1'>
          <h4 type='hidden'>No Cuenta con suficientes cuentas propias</h4>
        </div>
     
      </div>
      
      <div class="jumbotron text-center col-lg-4 col-md-6 col-sm-6 col-xs-6 offset-3 float-md-center" id="estadocuenta" data-toggle="collapse" data-target="#terceros">
        <h3 data-toggle="collapse" data-target="#terceros">Transferencia a Terceros</h3>      
      </div> 

      <div id="terceros" class="collapse col-lg-4">
        <div id='mostrar2'>
          <h4>Cuenta Origen:</h4>
          <select class="custom-select" id="cuentauno">
          </select> 
          <h4>Cuenta Destino:</h4>
          <input type="number"  id="cuentados">
          <h4>Monto:</h4>
          <input type="number"  placeholder="monto" id="montob">
          <input type="submit" class="fadeIn fourth" id="transferirb" value="Transferir">
        </div>

        <div id='error2'>
          <h4 type='hidden'>No Cuenta con suficientes cuentas propias</h4>
        </div>

      </div>
  </div>




    <div class="col-sm-12 table-responsive">
                        <table id="tablatransacciones" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Fecha</th>
                                    <th>ID</th>
                                    <th>Cuenta Origen</th>
                                    <th>Cuesta Destino</th>
                                    <th>Monto</th>                              
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Fecha</th>
                                    <th>ID</th>
                                    <th>Cuenta Origen</th>
                                    <th>Cuesta Destino</th>
                                    <th>Monto</th>                              
                                </tr>
                            </tfoot>
                        </table>
    </div>

                    <input type="hidden" id="cuenta" value="{{$id}}">
            


  <div class="modal" tabindex="-1" role="dialog" id='modalerror'>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Error</h2>
        </div>
        <div class="modal-body">
          <p id='mensajerror'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id='cerrarmodal'>Cerrar</button>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" tabindex="-1" role="dialog" id='resultadotransferencia'>
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h2 class="modal-title">Resumen de Transferencia</h2>
        </div>
        <div class="modal-body">
          <img src="" id="imageresult" alt="User Icon" />
          <p id='mensajetransferencia'></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" id='cerrarmodal2'>Cerrar</button>
        </div>
      </div>
    </div>
  </div>


  
</body>
</html>

<script src="{{asset('public/pages/transacciones.js')}}"></script>

<style>
    .titulo{
        display:flex;
        margin: 2% 0;
        justify-content:space-evenly;
        width: 100%;
    }
    h1{
        margin:0;
    }
  .modal-header{
    display:flex;
    justify-content: center;
  }
  .modal-body{
    display:flex;
    align-items:center;
    flex-direction: column;
  }
    #imageresult {
      width:20%;
    }
    .custom-select{
      width: 50%;
    }

    h1{
        text-align: center;
        cursor: pointer;
    }
    .container{
    display: flex;
    flex-direction:column;
    align-items: center;
    padding:0;
    margin:0;
    width:100%;
    }
    .jumbotron{
        cursor: pointer;
        margin: 2% 2%;
    }
    .dataTables_wrapper .dataTables_length {
        float: none;
        text-align: center;
    }
    .dataTables_wrapper .dataTables_filter {
        float: none; 
        text-align: center;
    }
    .table{
        border:  0.5px solid #21A4E0 ;
        border-radius:0.5em;
        margin: 0 15px;
    }
    table.dataTable th{
        color: #21A4E0 !important;
        
    }

    .table-striped>tbody>tr:nth-child(odd)>td, 
    .table-striped>tbody>tr:nth-child(odd)>th {
       background-color: #E5F7FF ; 
     }
    
    .table-striped>tbody>tr:nth-child(even)>td, 
    .table-striped>tbody>tr:nth-child(even)>th {
       background-color: #f7f7f7; 
     }
     #table_length > label > select{
        height:auto;
    }

   #cuentaspropias{
    border-style: solid;
   }
   #terceros{
    border-style: solid;
   }
</style>