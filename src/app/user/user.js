var subselector = 'All';
var checkimage = false;

$(document).ready(function () {

    session = $.trim($('#session').val());
    if (session=='desactiva') {
        window.open('./');  
    }

    $('#formUser').submit(function (e) { 
        e.preventDefault();

        idUser   = $.trim($('#idUser').val());
        nickname = $.trim($('#nickname').val());
        type     = $.trim($('#type').val());

        var datos = new FormData();

        datos.append('idUser', idUser)
        datos.append('nickname', nickname)
        datos.append('type', type)


        $.ajax({
            url: "src/app/user/user_controller.php?op=save_update",
            type: "POST",
            dataType:"json",    
            data:  datos,
            cache: false,
            contentType: false,
            processData: false, 
            success: function(data) {
              console.log(data)
                swal("Has Actualizado Exitosamente el Producto: ", {
                    buttons: false,
                    icon: "success",
                    timer: 2000,
                });

                $('#UserModal').modal('hide');

                setTimeout(() => {
                    UserTable.ajax.reload(null, false);
                  }, 1000);
                
              
            }
    
          });
        
    });


    $(document).on("click", ".BtnEditUser", function(){		        
        fila = $(this).closest("tr");	        		            
        idUser  = fila.find('td:eq(0)').text();
        nickname = fila.find('td:eq(1)').text(); //capturo el ID
        type     = fila.find('td:eq(3)').text();
        if (type=='Administrador') {
            type = 1;
        }
        if (type=='Personal Admin') {
            type = 2;
        }
        if (type=='Estandar') {
            type = 3;
        }

        $("#idUser").val(idUser);
        $("#nickname").val(nickname);
        $("#type").val(type);
        $(".modal-content").css("background", "rgb(255,24,8)" );
        $(".modal-content").css("background", "linear-gradient(90deg, rgba(255,24,8,0.6643032212885154) 0%, rgba(103,121,9,0.6727065826330532) 50%, rgba(0,78,255,0.6839110644257703) 100%)" );
        $(".modal-title").text("Editar Informacion de Usuario");		
        $('#UserModal').modal('show');	
    });

    
});

function getContenttable() {

    UserTable = $('#UserTable').DataTable({  
        "pageLength": 50,
        "ajax":{            
            "url": "src/app/user/user_controller.php?op=enlist", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "userid"},
            {"data": "login"},
            {"data": "status",
            "render":function(data) {
                if (data==1) {
                    return  'Activo'
                }
                if (data==0) {
                    return  'Inactivo'
                }
                
            }
            },
            {"data": "type",
            "render":function(data) {
                if (data==1) {
                    return  'Administrador'
                }
                if (data==2) {
                    return  'Personal Admin'
                }
                if (data==3) {
                    return  'Estandar'
                }
            }
            },
            {"defaultContent": "<div class='text-center'><div class='btn-group'><button class='btn btn-primary btn-sm BtnEditUser'><i class='bi bi-pencil-square'></i></button><button class='btn btn-danger btn-sm BtnDeleteUser' disabled><i class='bi bi-trash3'></i></button></div></div>"}
        ],
    });

}

function wipe() {
    $("#idUser").val("");
    $('#nickname').val("");
    $('#type').val("");
}

getContenttable()