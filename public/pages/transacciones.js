$('document').ready(function () {
    var id = $('#cuenta').val() ;
    $('#error1').hide();
    $('#error2').hide();



    $.ajax({
        url: '/Cognox/cuentas/'+id,
        type: "GET",
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));},
        contentType: 'application/json; charset=utf-8',
        success: function (result) {
            
            var listitems = '';
            var $select1 = $('#cuentaa'); 
            var $select2 = $('#cuentab'); 
            var $select3 = $('#cuentauno'); 
            $.each(result, function(key, value){
                listitems += '<option value=' + value['cuenta'] + '>' + value['cuenta'] + '</option>';
            });

            if(result.length <= 1){
                $('#mostrar1').hide();
                $('#error1').show();
            }
            if(result.length == 0){
                $('#mostrar2').hide();
                $('#error2').show();
            }
            $select1.append(listitems);
            $select2.append(listitems);
            $select3.append(listitems);
        },
        error: function (error) {
            
        }
     });



    
    $.ajax({
        url: '/Cognox/listatransferencias/'+id,
        type: "GET",
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));},
        contentType: 'application/json; charset=utf-8',
        success: function (result) {
            table = $('#tablatransacciones').DataTable({
                scrollCollapse: true,
                autoWidth: false,
                responsive: false,
                searchDelay: 400,
                stateSave: true,
                lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
                data: result,
                "columns": [
                    {"data": "fecha"},
                    {"data": "id"},
                    {"data": "cuenta_origen"},
                    {"data": "cuenta_destino"},
                    {"data": "monto"}
                ],
             });
        },
        error: function (error) {
            
        }
     });

     $( "#logout" ).click(function() {
        window.location.href = '/Cognox/logout';
      });

     $( "#titulo" ).click(function() {
        var id = $('#cuenta').val() ;
        window.location.href = '/Cognox/home/'+id;
      });

      $('#cerrarmodal').click(function() {
        $('#modalerror').hide();
      });
      $('#cerrarmodal2').click(function() {
        $('#resultadotransferencia').hide();
        location.reload();
      });

      $( "#transferira" ).click(function() {
        var cuentaa = $("#cuentaa").val();
        var cuentab = $("#cuentab").val();
        var monto = $("#montoa").val();

        if(cuentaa != cuentab){
            if(monto > 0){

                var data = [cuentaa,cuentab,monto];

                $.ajax({                        
                    type: "POST",                 
                    url: '/Cognox/transferir',                     
                    data: JSON.stringify({ 'cuenta_origen': cuentaa  , 'cuenta_destino': cuentab , 'monto':monto , 'tipo_transaccion':'propias'}), 
                    dataType: 'text',
                    beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));},
                    contentType: 'application/json; charset=utf-8',
                    success: function(data)             
                    {
                           
                            if(!isNaN(data)){
                                $("#imageresult").attr("src","/Cognox/public/styles/success.png");
                                $('#mensajetransferencia').text('Transferencia Exitosa. Codigo: '+data)
                                $('#resultadotransferencia').show();
                            }else{
                                $("#imageresult").attr("src","/Cognox/public/styles/error.png");
                                $('#mensajetransferencia').text(data)
                                $('#resultadotransferencia').show();
                            }

                        

                        
                    }
                });
            }else{
                $('#mensajerror').text('El monto ingresado debe ser mayor a 0')
                $('#modalerror').show();
            }

        }else{
            $('#mensajerror').text('La cuenta origen y destino deben ser distintas')
            $('#modalerror').show();
        }

      });

      $( "#transferirb" ).click(function() {
        var cuentaa = $("#cuentauno").val();
        var cuentab = $("#cuentados").val();
        var monto = $("#montob").val();

        if(cuentab !=''){
            if(monto>0){
                var data = [cuentaa,cuentab,monto];
                $.ajax({                        
                    type: "POST",                 
                    url: '/Cognox/transferir',                     
                    data: JSON.stringify({ 'cuenta_origen': cuentaa  , 'cuenta_destino': cuentab , 'monto':monto , 'tipo_transaccion':'terceros'}), 
                    dataType: 'text', 
                    beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));},
                    contentType: 'application/json; charset=utf-8',
                    success: function(data)             
                    {
                        if(!isNaN(data)){
                            $("#imageresult").attr("src","/Cognox/public/styles/success.png");
                            $('#mensajetransferencia').text('Transferencia Exitosa. Codigo: '+data)
                            $('#resultadotransferencia').show();
                        }else{
                            $("#imageresult").attr("src","/Cognox/public/styles/error.png");
                            $('#mensajetransferencia').text(data)
                            $('#resultadotransferencia').show();
                        }
                    }
                });
            }else{
                $('#mensajerror').text('El monto ingresado debe ser mayor a 0')
                $('#modalerror').show();
            }

        }else{
            $('#mensajerror').text('La cuenta destino no debe estar vacia')
            $('#modalerror').show();
        }



      });

});