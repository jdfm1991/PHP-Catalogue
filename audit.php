<?php
include_once ('header.php');
?>
<input type="hidden" id="page" name="page" value="Auditoria de Eventos">
<input type="hidden" id='sesion' value=<?php echo $_SESSION['userid'] ?> />

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="tab-content">

            <div class="tab-pane active show" id="userlog">
                <section class="section-bg">                      

                    <div class="container" data-aos="fade-up">
        
                        <div class="table-responsive col-xl">
                            <!--begin::Table Widget 6-->
                            <div class="card mb-3">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <div class="row">
                                        <div class="col-4">
                                            <select id="subselector" class="form-select" aria-label="Default select example">
                                                <!-- CARGA A TRAVEZ DE AJAX -->
                                            </select>
                                        </div>
                                        <div id="option" class="text-center">
                                            <a href="http://" class="btn btn-success btn-outline-success text-center" role="button" aria-pressed="true" Target="_blank"><img src="./src/assets/img/company/user.png" width="100" class="img" alt="..."><label for=""><strong>Usuarios</strong></label></a>
                                            <img src="./src/assets/img/company/confisur.png" width="400" class="img" alt="...">
                                            <img src="./src/assets/img/company/subsidiary.png" width="130" class="img" alt="...">
                                            <img src="./src/assets/img/company/brand.png" width="100" class="img" alt="...">
                                            <img src="./src/assets/img/company/product.png" width="160" class="img" alt="...">
                                            <img src="./src/assets/img/company/user.png" width="100" class="img" alt="...">
                                        </div>
                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <!--begin::Table-->
                                <div class="card-body">
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <div class="table-responsive">        
                                                <table id="AudotTable" class="table" style="width:100%" >
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Usuario</th>
                                                            <th>Sucursal</th>
                                                            <th>Asunto</th>
                                                            <th>Fecha</th>
                                                            <th>Duracion</th>
+                                                        </tr>
                                                    </thead>
                                                    <tbody>                           
                                                    </tbody>        
                                                </table>               
                                            </div>
                                            </div>
                                        </div>  
                                    </div>  
                                </div>
                                <!--end::Table-->
                                <!--end::Body-->
                            </div>

                            <!--end::Tables Widget 6-->
                        </div>
                    

                    </div>

                </section>
            </div>

        </div>

    </div>
    </section><!-- End Services Section -->

    <script src="src/app/audit/audit.js"></script>

<?php
include_once ('footer.php');
?>