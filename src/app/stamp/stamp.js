var subselector = 'All';
$(document).ready(function () {
    
    session = $.trim($('#session').val());
    if (session=='desactiva') {
        window.open('./');  
    }

    $('#subselector').change(function (e) { 
        e.preventDefault();
        subselector = $('#subselector').val();
        getContenttable(subselector)
        
    });

    $('#formStamp').submit(function (e) { 
        e.preventDefault();

        idbrand      = $.trim($('#idbrand').val());
        descripbrand = $.trim($('#descripbrand').val());
        sucubrand    = $.trim($('#sucubrand').val());
        placebrand   = $.trim($('#placebrand').val());

        var datos = new FormData();

        datos.append('idbrand', idbrand)
        datos.append('descripbrand', descripbrand)
        datos.append('sucubrand', sucubrand)
        datos.append('placebrand', placebrand)


        $.ajax({
            url: "src/app/stamp/stamp_controller.php?op=save_update",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(data) {
              console.log(data)
                swal("Has Actualizado Exitosamente la posicion de la Marca: "+data.descripbrand, {
                    buttons: false,
                    icon: "success",
                    timer: 2000,
                });

                $('#StampModal').modal('hide');

                setTimeout(() => {
                    BrandTable.ajax.reload(null, false);
                  }, 1000);
                
              
            }
    
          });
        
    });

    $('#btnbrand').click(function (e) {
        e.preventDefault();

        wipe()         
        $(".modal-content").css("background", "rgb(255,24,8)" );
        $(".modal-content").css("background", "linear-gradient(90deg, rgba(255,24,8,0.6643032212885154) 0%, rgba(103,121,9,0.6727065826330532) 50%, rgba(0,78,255,0.6839110644257703) 100%)" );
        $(".modal-title").text("Crear Nueva Marca")		
        $('#StampModal').modal('show');	
    });

    $(document).on("click", ".BtnEditBrand", function(){		        
        fila = $(this).closest("tr");	        		            
        idbrand  = fila.find('td:eq(0)').text();
        descripbrand = fila.find('td:eq(1)').text(); //capturo el ID
        sucubrand    = fila.find('td:eq(2)').text();
        placebrand    = fila.find('td:eq(3)').text();

        //console.log(sucubrand)

        $.ajax({
            url: "src/app/stamp/stamp_controller.php?op=stampselector",
            method: "POST",
            dataType: "json",
            data:  {sucubrand:sucubrand},
            beforeSend: function () {
        
            },   
            success: function(data) {
                //console.log(data)
              $.each(data, function(idx, opt) {
                  //se itera con each para llenar el select en la vista
                  $("#sucubrand").val(opt.CodSucu);
              }); 
            }
        
          });

        $("#idbrand").val(idbrand);
        $("#descripbrand").val(descripbrand);
        $("#sucubrand").val(sucubrand);
        $("#placebrand").val(placebrand);
        $(".modal-content").css("background", "rgb(255,24,8)" );
        $(".modal-content").css("background", "linear-gradient(90deg, rgba(255,24,8,0.6643032212885154) 0%, rgba(103,121,9,0.6727065826330532) 50%, rgba(0,78,255,0.6839110644257703) 100%)" );
        $(".modal-title").text("Editar Informacion de Marca");		
        $('#StampModal').modal('show');	
    });

    $(document).on("click", ".BtnDeleteBrand", function(){
        fila = $(this);           
        idbrand = $(this).closest('tr').find('td:eq(0)').text();
        descripbrand = $(this).closest('tr').find('td:eq(1)').text();
        sucubrand = $(this).closest('tr').find('td:eq(2)').text();
        placebrand = $(this).closest('tr').find('td:eq(3)').text();

        var datos = new FormData();

        datos.append('idbrand', idbrand)
        datos.append('descripbrand', descripbrand)
        datos.append('sucubrand', sucubrand)
        datos.append('placebrand', placebrand)
  
        swal({
        
            title: "Eliminar Marca",
            text: "¿Está seguro de borrar el registro "+descripbrand+"?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            
          })
          .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                    url: "src/app/stamp/stamp_controller.php?op=delete",
                    type: "POST",
                    dataType:"json",
                    data:  datos,   
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                        console.log(data)
                        swal("¡Se elimino marca Exitosamente!", {
                          buttons: false,
                          icon: "success",
                          timer: 1000,
                          
                        });
                                  
                        setTimeout(() => {
                            BrandTable.ajax.reload(null, false);
                        }, 1000);
          
                    
                                          
                     }
                  });	
            }
          });
  
      });
    
});

function stampselector() {
    $.ajax({
        type: "POST",
        url: "src/app/stamp/stamp_controller.php?op=stampselector",
        dataType: "json",
        success: function (data) {
            $('#subselector').append('<option value="All" selected>Seleccione Sucursal</option>');
            $.each(data, function(idx, opt) {
                $('#subselector').append('<option name="" value="' + opt.CodSucu +'">' + opt.Descrip + '</option>');

            });
                       
        }
    });
    
}

function modalselector() {
    $.ajax({
        type: "POST",
        url: "src/app/stamp/stamp_controller.php?op=stampselector",
        dataType: "json",
        success: function (data) {
            $('#sucubrand').append('<option value="All" selected>Seleccione Sucursal</option>');
            $.each(data, function(idx, opt) {
                $('#sucubrand').append('<option name="" value="' + opt.CodSucu +'">' + opt.Descrip + '</option>');

            });
                       
        }
    });
    
}

function limitstamp() {

    $.ajax({
        type: "POST",
        url: "src/app/stamp/stamp_controller.php?op=enlist",
        dataType: "json",
        success: function (data) {
            //console.log(data.length)
            $('#item').empty();
            $('#item').append('<input class="form-control" id="placebrand" type="number" min="1" max="' + data.length + '" required>');
                       
        }
    });
    
}

function getContenttable(subselector) {

    if (BrandTable) {

        $('#BrandTable').DataTable().destroy();

        BrandTable = $('#BrandTable').DataTable({  
            "pageLength": 50,
            "ajax":{            
                "url": "src/app/stamp/stamp_controller.php?op=enlist", 
                "method": 'POST', //usamos el metodo POST
                "data":  {'subselector':subselector},
                "dataSrc":""
            },
            "columns":[
                {"data": "CodInst"},
                {"data": "brand"},
                {"data": "branch"},
                {"data": "OrdInst"},
                {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditBrand'><i class='bi bi-pencil-square'></i></button><button class='btn btn-danger btn-sm BtnDeleteBrand' disabled><i class='bi bi-trash3'></i></button></div></div>"}
            ]
        });
        
    } else {

        BrandTable = $('#BrandTable').DataTable({  
            "pageLength": 50,
            "ajax":{            
                "url": "src/app/stamp/stamp_controller.php?op=enlist", 
                "method": 'POST', //usamos el metodo POST
                "data":  {'subselector':subselector},
                "dataSrc":""
            },
            "columns":[
                {"data": "CodInst"},
                {"data": "brand"},
                {"data": "branch"},
                {"data": "OrdInst"},
                {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditBrand'><i class='bi bi-pencil-square'></i></button><button class='btn btn-danger btn-sm BtnDeleteBrand' disabled><i class='bi bi-trash3'></i></button></div></div>"}
            ]
        });
        
    }

}

function wipe() {
    $("#idbrand").val("");
    $('#descripbrand').val("");
    $('#sucubrand').val("");
    $('#placebrand').val("");
}

stampselector()
modalselector()
limitstamp()
getContenttable(subselector)