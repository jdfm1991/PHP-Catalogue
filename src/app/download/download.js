var subselector = 'All';
var stamps = 'All';
var price = '1';
var existe = false;

$('#bodyselect').hide()
$('#optionbody').hide()

document.getElementById('btnsearch').disabled = true;


$(document).ready(function () {

    session = $.trim($('#session').val());
    if (session=='desactiva') {
        window.open('./');  
    }

    $('#subselector').change(function (e) {
        e.preventDefault();

        $('#substamp').height(250)
        $('#bodyselect').show()
        document.getElementById('btnsearch').disabled = false;
        subselector = $('#subselector').val();
        $('#substamp').empty()
        substamps(subselector)
    });

    $('#substamp').click(function (e) { 
        e.preventDefault();

        stamps = $('#substamp').val();
        
    });

    $('#price').change(function (e) {
        e.preventDefault();

        price = $('#price').val();
    });

    $("#existe").click(function (e) {
        
        if ($('#existe').prop('checked')) {
            existe = $('#existe').prop('checked');
        } else {
            existe = $('#existe').prop('checked');
        }


    });


    $("#searchform").submit(function (e) { 
        e.preventDefault();

        $('#optionbody').show()
        console.log(stamps)

        $('#btncatalogue').click(function (e) { 
            e.preventDefault();
            window.open('pdf.php?op=catalogue&subselector='+ subselector +'&stamps='+ stamps +'&price='+ price +'&existe='+ existe +'', '_blank');  
            
        });

        $('#btnlist').click(function (e) { 
            e.preventDefault();
            window.open('pdf.php?op=list&subselector='+ subselector +'&stamps='+ stamps +'&price='+ price +'&existe='+ existe +'', '_blank');  
            
        });
        //searchcontent(subselector,stamps,price,existe)
       // $("#subsidiary").val(subselector);

    });


    

    
});

function subsiduary() {
    $.ajax({
        type: "POST",
        url: "src/app/download/download_controller.php?op=subselector",
        dataType: "json",
        success: function (data) {
            $('#subselector').append('<option value="All" selected>Seleccione Sucursal</option>');
            $.each(data, function(idx, opt) {
                $('#subselector').append('<option name="" value="' + opt.CodSucu +'">' + opt.Descrip + '</option>');

            });
                       
        }
    });
    
}

function substamps(subselector) {

    $.ajax({
        type: "POST",
        url: "src/app/download/download_controller.php?op=substamps",
        data:  {subselector:subselector},
        dataType: "json",
        success: function (data) {
            $('#substamp').append('<option value="All" selected>Todas las Marcas</option>');
            $.each(data, function(idx, opt) {
                $('#substamp').append('<option name="" value="' + opt.CodInst +'">' + opt.Descrip + '</option>');

            });
                       
        }
    });
    
}

function searchcontent(subselector,stamps,price,existe) {

    console.log(subselector,stamps,price,existe)
    //console.log(stamps.length)

    var datos = new FormData();

    datos.append('subselector', subselector)
    datos.append('stamps', stamps)
    datos.append('price', price)
    datos.append('existe', existe)

    $.ajax({
        url: "src/app/download/download_controller.php?op=searchcontent",
        type: "POST",
        dataType:"json",    
        data:  datos,
        cache: false,
        contentType: false,
        processData: false, 
        success: function(data) {

          console.log(data)

        }

    });
}

subsiduary()




























function loadCheck() {

    $.ajax({
        type: "POST",
        url: "src/app/download/download_controller.php?op=multicheck",
        dataType: "json",
        success: function (data) {
            $.each(data, function(idx, opt) {
                $('#multicheck').append('<input class="form-check-input" type="checkbox" value="' + opt.CodSucu +' name="sede[]><label class="form-check-label" for="flexCheckDefault">' + opt.Descrip + '</label><br>');
            });
                       
        }
    });
    
}



