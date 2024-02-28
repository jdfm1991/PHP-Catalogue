<?php
include_once ('header.php');
?>
<input type="hidden" id="page" name="page" value="index">

  <section class="d-flex flex-column justify-content-end">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-lg-4 text-center">
          <input class="form-control" list="datalistOptions" id="search" placeholder="¿Qué Deseas Buscar...?">
          <!--
          <datalist id="datalistOptions">
            <option value="San Francisco">
            <option value="New York">
            <option value="Seattle">
            <option value="Los Angeles">
            <option value="Chicago">
          </datalist>-->
        </div>
      </div>
    </div>
  </section>
  

    <div>
    
        
    </div>

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
      <div class="container-fluid"> 
        <div id="index" class="row gy-4 justify-content-center">
          
        </div>

        <nav id="pager" class="d-flex justify-content-center" aria-label="...">
          
        </nav>
      </div>
    </section>
    <!-- End Gallery Section -->    

<?php
include_once ('footer.php');
?>