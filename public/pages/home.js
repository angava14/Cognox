$('document').ready(function () {
  

    $('#transacciones').on('click', function(){
        id = $('#cuenta').val();
        window.location.href = "/Cognox/transacciones/"+id;
    });
    $('#estadocuenta').on('click', function(){
      id = $('#cuenta').val();
      $.ajax({
        url: '/Cognox/cuentas/'+id,
        type: "GET",
        beforeSend: function(xhr){xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));},
        contentType: 'application/json; charset=utf-8',
        success: function (result) {
          var div = $('#resultados'); 
          var listitems = '';
          $.each(result, function(key, value){
            listitems += '<p value=' + value['cuenta'] + '>' + 'Cuenta: '+ value['cuenta'] +' - Saldo: ' + value['saldo'] + '</p>';
          });

          div.append(listitems);

        
        }
     });
    });

  $( "#logout" ).click(function() {
    window.location.href = '/Cognox/logout';
  });

  




});