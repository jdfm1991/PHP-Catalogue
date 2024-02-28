var search='';
var numbtn = 1;
$(document).ready(function () {

  $('#menu a').click(function (e) { 
    e.preventDefault();

    var option = e.target.dataset.option
    
    if (option == 'Home') {
      $(location).attr('href','./');
    }
    if (option == 'Productos') {
      $(location).attr('href','commodity.php');
    }
    if (option == 'Marcas') {
        $(location).attr('href','stamp.php');
    }
    if (option == 'Descarga') {
      $(location).attr('href','download.php');
    }
    if (option == 'Usuarios') {
      $(location).attr('href','user.php');
    }
    if (option == 'Auditoria') {
      $(location).attr('href','audit.php');
    }

  });

  page = $.trim($('#page').val());
  
  if (page != 'index') {
    $('#hero').empty();
    $('#hero').append('<div class="d-flex justify-content-center"><div class="text-center"><h2>'+ page +'</h2></div></div>');
  }

  $.ajax({
    type: "POST",
    url: "src/app/index/index_controller.php?op=title",
    dataType: "json",
    success: function (data) {
      //console.log(data)
      $('#title').empty();
      $.each(data, function(idx, opt) {
        $('#title').append('<a href="./" class="logo d-flex align-items-center  me-auto me-lg-0"><img src="src/assets/img/company/' + opt.img +'" alt=""><h1>&nbsp; ' + opt.Descrip +' &nbsp; </h1><i class="bi bi-shop-window"></i></a>');
      });      
    }
  });

  $('#search').keyup(function (e) {
    search = $(this).val();  
    productloading(search,numbtn)   
  });
  

  $('#btnlogin').click(function (e) {
      e.preventDefault();
      
      $(".modal-content").css("background", "rgb(255,24,8)" );
      $(".modal-content").css("background", "linear-gradient(90deg, rgba(255,24,8,0.6643032212885154) 0%, rgba(103,121,9,0.6727065826330532) 50%, rgba(0,78,255,0.6839110644257703) 100%)" );
      $(".modal-title").text("Login - Modulo Admin")		
      $('#loginModal').modal('show');	
  });

  $('#formLogin').submit(function (e) { 
      e.preventDefault();

      login = $.trim($('#login').val());
      passw = $.trim($('#passw').val());

      var datos = new FormData();

      datos.append('login', login)
      datos.append('passw', passw)

      $.ajax({
          url: "src/app/index/index_controller.php?op=login",
          type: "POST",
          dataType:"json",    
          data:  datos,
          cache: false,
          contentType: false,
          processData: false,
          beforeSend: function () {

          },   
          success: function(data) {
            if (data.status == true) {
              swal("Bienvenido Has iniciado sesion correctamente", {
                buttons: false,
                icon: "success",
                timer: 3000,
                
              });
              
              $('#loginModal').modal('hide');

              setTimeout(() => {
                location.reload(); 
              }, 3000);

            } else {
              swal("El Usuario y/o password es incorrecto o no tienes permiso!", {
                buttons: false,
                icon: "error",
                timer: 3000,
                
              });
            }
              
            }
        });

        
      
  })
    
  $('#signoff').click(function (e) { 
      e.preventDefault();

      swal({
        title: "Cierre de sesion",
        text: "¿Esta seguro que desea cerrar sesion?",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        
      })
      .then((willDelete) => {
        if (willDelete) {
          $(location).attr('href','logout.php');
        }
      });
      
  });
    
});




function productloading(search,numbtn) {

  //console.log(search,numbtn)

    
  var datos = new FormData();
    
  datos.append('search', search)
  datos.append('numbtn', numbtn)
    
    $.ajax({
        type: "POST",
        url: "src/app/index/index_controller.php?op=productloading",
        dataType: "json",
        data:  {search:search, numbtn:numbtn},
        success: function (data) {
          //console.log(data)
          $('#index').empty();
          $.each(data, function(idx, opt) {
            $('#index').append('<div class="col-xl-3 col-lg-4 col-md-6"><div class="gallery-item h-100"><img src="src/assets/img/gallery/' + opt.imagep +'" class="img-fluid" alt=""><div class="gallery-links d-flex align-items-center justify-content-center"></div></div></div>');
          });

          const count = data.count
          //console.log(count)
          //$('#pager').empty();
          //for (let index = 1; index <= count ; index++) {
            //$('#pager').append('<input id="btnpage" type="button" class="btn btn-light btn-outline-primary" value="' + index +'">');
          //}

        }
    });
    
}

productloading(search,numbtn)
