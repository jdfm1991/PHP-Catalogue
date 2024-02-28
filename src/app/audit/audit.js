$('#option').hide();
sesion = $.trim($('#sesion').val());
$(document).ready(function () {

    AudotTable = $('#AudotTable').DataTable({  
        "pageLength": 50,
        "ajax":{            
            "url": "src/app/audit/audit_controller.php?op=enlist", 
            "method": 'POST', //usamos el metodo POST
            "dataSrc":""
        },
        "columns":[
            {"data": "login"},
            {"data": "Descrip"},
            {"data": "issue"},
            {"data": "actdate"},
            {"data": "acttime"},
        ],
        "columnDefs": [
            { "width": "50%", "targets": 2 }
          ]
    });

    $('#subselector').change(function (e) {

        e.preventDefault();
        subselector = $('#subselector').val();
        if (subselector != '-') {
            linksubsidiary(subselector,sesion)
        }else{
            $('#option').hide();
        }
        

    });
    
});

function subsiduary() {
    $.ajax({
        type: "POST",
        url: "src/app/download/download_controller.php?op=subselector",
        dataType: "json",
        success: function (data) {
            $('#subselector').append('<option value="-">Seleccione Sucursal</option>');
            $.each(data, function(idx, opt) {
                $('#subselector').append('<option name="" value="' + opt.CodSucu +'">' + opt.Descrip + '</option>');

            });
                       
        }
    });
    
}
function linksubsidiary(subselector,sesion) {
    
    //console.log(subselector)
    $.ajax({
        type: "POST",
        url: "src/app/audit/audit_controller.php?op=linksubsidiary",
        dataType: "json",
        data:  {subselector:subselector},
        success: function (data) {
            $('#option').empty();
            $('#option').show();
            $.each(data, function(idx, opt) {
                $('#option').append('<img src="./src/assets/img/company/' + opt.img +'" width="300" class="img" alt="...">');
                $('#option').append('<a href="http://'+ opt.ddns +'/interfaces/src/interface/interface_controller.php?op=subsidiary&user=' + sesion +'" class="btn btn-outline-primary text-center" role="button" aria-pressed="true" Target="_blank"><img src="./src/assets/img/company/subsidiary.png" width="100 class="img" alt="..."><br><label for=""><strong>Sucursal</strong></label></a>');
                $('#option').append('<a href="http://'+ opt.ddns +'" class="btn btn-outline-success text-center" role="button" aria-pressed="true" Target="_blank"><img src="./src/assets/img/company/brand.png" width="100" class="img" alt="..."><br><label for=""><strong>Marcas</strong></label></a>');
                $('#option').append('<a href="http://'+ opt.ddns +'" class="btn btn-outline-info text-center" role="button" aria-pressed="true" Target="_blank"><img src="./src/assets/img/company/product.png" width="100" class="img" alt="..."><br><label for=""><strong>Productos</strong></label></a>');
                $('#option').append('<a href="http://'+ opt.ddns +'" class="btn btn-outline-secondary text-center" role="button" aria-pressed="true" Target="_blank"><img src="./src/assets/img/company/user.png" width="100" class="img" alt="..."><br><label for=""><strong>Usuarios</strong></label></a>');
            });
                       
        }
    });
}
subsiduary()

