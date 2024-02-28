<?php
include_once ('header.php');
echo $user = $_SESSION['userid'];
setcookie('user', $user, time() + 3600);
?>
<input type="hidden" id="page" name="page" value="Seccion de Descarga">

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
                                    <form id="searchform" class="form-horizontal" method="POST">
                                        <div class="row">
                                            <div class="col-4">
                                                <select id="subselector" class="form-select" aria-label="Default select example" required>
                                                    <!-- CARGA A TRAVEZ DE AJAX -->
                                                </select>
                                            </div>
                                            <div id="bodyselect" class="row col-8">
                                                <div class="col-6">
                                                    <select name="substamp" id="substamp" class="form-select" aria-label="Default select example" multiple required>
                                                        <!-- CARGA A TRAVEZ DE AJAX -->
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <select id="price" class="form-select"  required>
														<option selected value="1">Precio 1</option>
														<option value="2">Precio 2</option>
														<option value="3">Precio 3</option>														
													</select>
                                                </div>

                                                <div class="col-3">
                                                    <div class="form-check">
                                                        <input id="existe" class="form-check-input" type="checkbox">
                                                        <label class="form-check-label" for="flexCheckDefault">Solo Con Existencia</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="d-grid gap-3 d-md-flex justify-content-md-end">                                        
                                                <button id="btnsearch" type="submit"  class="btn btn-outline-primary btn-light"><i class="bi bi-search"></i> <span>Buscar</span></button>    
                                            </div>
                                        </div>
                                    </form>
                                    
                                </div>
                                <!--end::Header-->
                                <!--begin::Body-->
                                <!--begin::Table-->
                                <div id="optionbody" class="card-body">
                                    <div class="container caja">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a id="btncatalogue" class="btn btn-outline-info text-center" role="button" aria-pressed="true" Target="_blank">
                                                            <img src="src/assets/img/company/catalogue.png" class="card-img-top" alt="...">
                                                            <label for=""><strong>Catalogo</strong></label>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <a id="btnlist" class="btn btn-outline-info text-center" role="button" aria-pressed="true" Target="_blank">
                                                            <img src="src/assets/img/company/list.png" class="card-img-top" alt="...">
                                                            <label for=""><strong>lista</strong></label>
                                                        </a>
                                                        
                                                    </div>
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

    <script src="src/app/download/download.js"></script>

<?php
include_once ('footer.php');
?>