<!-- Modal login -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Login - Modulo Admin</h1>
        <button type="button" id="closeLogin" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formLogin">    
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">login - Usuario</label>
                        <input type="text" class="form-control" id="login" placeholder="login - Usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="contenido" class="form-label">Password - Contraseña</label>
                        <input type="password" class="form-control" id="passw" placeholder="Password - Contraseña" required>
                    </div>              
                </div>
                <div class="modal-footer">
                    <button type="button" id="cncLogin" class="btn btn-outline-danger btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" id="btnLogin" class="btn btn-outline-primary btn-light">Login</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="StampModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Infomacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formStamp">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idbrand">
                    <div class="row">
                      <div class="col-6">
                          <label for="contenido" class="form-label">Nombre de Marca</label>
                          <input type="text" class="form-control" id="descripbrand" required>  
                      </div>
                      <div class="col-6">
                        <label for="title" class="form-label">Sucursual</label>
                        <select class="form-select" id="sucubrand" required>
                          <!-- CARGA A TRAVEZ DE AJAX -->
                        </select> 
                      </div>
                      <div class="col-6">
                        <label for="contenido" class="form-label">Posicion</label>
                        <div id="item"></div>
                      </div>
                    
                    </div>                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" class="btn btn-outline-primary btn-light">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade" id="CommodityModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Infomacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form id="formCommodity">    
                <div class="modal-body">
                    <input type="hidden" class="form-control" id="idCommodity">
                    <div class="row">
                      <div class="col-6">
                          <label for="contenido" class="form-label">Nombre de Productos</label>
                          <input type="text" class="form-control" id="descripCommodity" required>  
                      </div>
                      <div class="col-6">
                        <label for="simagecm" class="form-label">Imagen</label>
                        <input class="form-control" type="file" onkeyup="loaddds(1);" name="image" id="image"  accept="image/x-png,image/gif,image/jpeg">
                      </div>
                    
                    </div>                        
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                    <button type="submit" class="btn btn-outline-primary btn-light">Guardar</button>
                </div>
            </form>  
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="UserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Nueva Infomacion</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <form id="formUser">    
              <div class="modal-body">
                  <input type="hidden" class="form-control" id="idUser">
                  <div class="row">
                    <div class="col-12">
                        <h2 class="card-title">Datos Principales</h2> 
                    </div>
                    <div class="col-6">
                      <label for="nick">Nick Name *</label>
                      <input type="text" class="form-control input-sm" minlength="3" maxlength="50" id="nickname" name="nickname" placeholder="Nickname de Usuario" required>                    </div>
                    <div class="col-6">
                      <label for="tipo">Tipo de Usuario *</label>
                      <select class="form-control custom-select" name="type" id="type" style="width: 100%;" required>
                          <option value="1">Administrador</option>
                          <option value="2">Personal Admin</option>
                          <option value="3" selected="selected">Estandar</option>
                      </select>                    </div>
        
                  </div>                        
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-danger btn-light" data-bs-dismiss="modal" aria-label="Close">Cancelar</button>
                  <button type="submit" class="btn btn-outline-primary btn-light">Guardar</button>
              </div>
          </form>  
        </div>
      </div>
    </div>
  </div>
</div>

