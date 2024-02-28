<?php
include_once ('header.php');
?>
<input type="hidden" id="page" name="page" value="Marcas Registradas">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
    <div class="container" data-aos="fade-up">

        <div class="tab-content">

            <div class="tab-pane active show" id="userlog">
                <section class="section-bg">                      

                    <div class="container" data-aos="fade-up">
        
                        <div class="table-responsive col-xl">
                            <!--begin::Table Widget 6-->
                            <div class="card text-bg-dark mb-3">
                                <!--begin::Header-->
                                <div class="card-header border-0 pt-5">
                                    <div class="row">
                                        <div class="col-4">
                                            <select id="subselector" class="form-select" aria-label="Default select example">
                                                <!-- CARGA A TRAVEZ DE AJAX -->
                                            </select>
                                        </div>
                                        <div class="col-4">
                                        </div>
                                        <div class="col-4 d-grid gap-3 d-md-flex justify-content-md-end">                                        
                                            <button id="btnbrand" type="button"  class="btn btn-primary" data-bs-toggle="modal" disabled><i class="bi bi-clipboard2-plus"></i> <span>Marcas</span></button>    
                                        </div>

                                    </div>
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <!--begin::Table-->
                                <div class="card-body">
                                    <div class="container caja">
                                        <div class="row">
                                            <div class="col-lg-12">
                                            <div class="table-responsive">        
                                                <table id="BrandTable" class="table table-dark table-striped" style="width:100%" >
                                                    <thead class="text-center">
                                                        <tr>
                                                            <th>Cod</th>
                                                            <th>Marca</th>
                                                            <th>Sucurcal</th>
                                                            <th>Posicion</th>
                                                            <th>Accion</th>
                                                        </tr>
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

    <script src="src/app/stamp/stamp.js"></script>

<?php
include_once ('footer.php');
?>