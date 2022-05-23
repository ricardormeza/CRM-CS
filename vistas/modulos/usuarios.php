<div class="content-wrapper">

  <section class="content-header">
    
    <h1>
      
      Administrar usuarios
    
    </h1>

    <ol class="breadcrumb">
      
      <li><a href= USUARIO"><i class="fa fa-dashboard"></i> Inicio</a></li>
      
      <li class="active">Administrar usuarios</li>
    
    </ol>

  </section>

  <!-- CONTENIDO PRINCIPAL DE USUARIOS -->
  <section class="content">

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <!-- <h3 class="box-title">Title</h3> -->
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarUsuario">Agregar Usuario</button>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
      </div>
      <div class="box-body">
        
        <table class="table table-bordered table-striped dt-responsive tablas" width="100%">
            <thead>
              <tr>
                <th style="width:10px">#</th>
                <th>Nombre</th>
                <th>Usuario</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>Último conexión</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                $item = null;
                $valor = null;

                $usuarios = ControladorUsuarios::ctrMostrarUsuarios($item, $valor);

                // var_dump($usuarios);
                foreach ($usuarios as $key => $value){
         
                  echo ' <tr>
                          <td>1</td>
                          <td>'.$value["nombre"].'</td>
                          <td>'.$value["usuario"].'</td>';
        
                          if($value["foto"] != ""){
        
                            echo '<td><img src="'.$value["foto"].'" class="img-thumbnail" width="40px"></td>';
        
                          }else{
        
                            echo '<td><img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail" width="40px"></td>';
        
                          }
        
                          echo '<td>'.$value["perfil"].'</td>';
        
                          if($value["estado"] != 0){
        
                            echo '<td><button class="btn btn-success btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="0">Activado</button></td>';
        
                          }else{
        
                            echo '<td><button class="btn btn-danger btn-xs btnActivar" idUsuario="'.$value["id"].'" estadoUsuario="1">Desactivado</button></td>';
        
                          }             
        
                          echo '<td>'.$value["ultimo_login"].'</td>
                          <td>
        
                            <div class="btn-group">
                                
                              <button class="btn btn-warning btnEditarUsuario" idUsuario="'.$value["id"].'" data-toggle="modal" data-target="#modalEditarUsuario"><i class="fa fa-pencil"></i></button>
        
                              <button class="btn btn-danger btnEliminarUsuario" idUsuario="'.$value["id"].'" fotoUsuario="'.$value["foto"].'" usuario="'.$value["usuario"].'"><i class="fa fa-times"></i></button>
        
                            </div>  
        
                          </td>
        
                        </tr>';
                }

              ?>

            </tbody>
          </table>
        
      </div>

      <!-- MODAL AGREGAR USUARIOS -->
          <!-- Modal -->
      <div class="modal fade" id="modalAgregarUsuario" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content" style="border-radius: 1rem;">
            <!-- ENVIO DE FORMULARIO -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <!-- HEADER-MODAL -->
                <div class="modal-header" style="background-color: #3c8dbc; color:white;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Agregar usuarios</h4>
                </div>
                <div class="modal-body">
                  <div class="box-body">
                    <!-- INGRESAR NOMBRE INICIO -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control input-lg" type="text" name="nuevoNombre" placeholder="Ingresar nombre" required> 
                      </div>
                    </div>
                    <!-- INGRESAR NOMBRE FIN -->
                    <!-- INGRESAR NOMBRE USUARIO -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input class="form-control input-lg" type="text" name="nuevoUsuario" placeholder="Ingresar usuario" required> 
                      </div>
                    </div>
                    <!-- INGRESAR USUARIO FIN -->
                    <!-- INGRESAR NOMBRE CONTRASEÑA -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input class="form-control input-lg" type="password" name="nuevoPassword" placeholder="Ingresar contraseña" required> 
                      </div>
                    </div>
                    <!-- INGRESAR CONTRASEÑA FIN -->
                    <!-- INGRESAR PERFIL -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <select class="form-control input-lg" name="nuevoPerfil" id="">
                          <option value="">Seleccionar perfil</option>
                          <option value="Administrador">Administrador</option>
                          <option value="Callcenter">Call Center</option>
                          <option value="Ventas">Vendedor</option>
                        </select>
                      </div>
                    </div>
                    <!-- INGRESAR PERFIL FIN -->
                    <!-- SUBIR FOTO-PERFIL -->
                    <div class="form-group">
                      <div class="panel">Subir foto</div>
                      <!-- <input type="file" id="nuevaFoto" class="nuevaFoto" name="nuevaFoto"> -->
                      <input type="file" class="nuevaFoto" name="nuevaFoto">
                      <p class="help-block">Peso máximo de la foto 2MB</p>
                      <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" alt="imagen muestra">
                    </div>
                    <!-- SUBIR FOTO-PERFIL FIN -->
                  </div>
                </div>
                <!-- PIE DE MODAL -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
                  <button type="submit" class="btn btn-primary">Guardar usuario</button>
                </div>

                <?php
                  $crearUsuario = new ControladorUsuarios();
                  $crearUsuario -> ctrCrearUsuario();

                ?>

            </form>
          </div>
        </div>
      </div><!-- FIN MODAL AGREGAR USUARIOS -->
            

      <!--=====================================
        MODAL EDITAR USUARIO
      ======================================-->
      <!-- MODAL Editar USUARIOS -->
          <!-- Modal -->
          <div class="modal fade" id="modalEditarUsuario" role="dialog">
        <div class="modal-dialog">
          <!-- Modal content-->
          <div class="modal-content" style="border-radius: 1rem;">
            <!-- ENVIO DE FORMULARIO -->
            <form role="form" method="post" action="" enctype="multipart/form-data">
              <!-- HEADER-MODAL -->
                <div class="modal-header" style="background-color: #3c8dbc; color:white;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Editar usuarios</h4>
                </div>
                <div class="modal-body">
                  <div class="box-body">
                    <!-- EDITAR NOMBRE INICIO -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input class="form-control input-lg" type="text" id="editarNombre" name="editarNombre" value="" required> 
                      </div>
                    </div>
                    <!-- EDITAR NOMBRE FIN -->
                    <!-- EDITAR NOMBRE USUARIO -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        <input class="form-control input-lg" type="text" id="editarUsuario" name="editarUsuario" value="" readonly> 
                      </div>
                    </div>
                    <!-- EDITAR USUARIO FIN -->
                    <!-- EDITAR NOMBRE CONTRASEÑA -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                        <input class="form-control input-lg" type="password" name="editarPassword" placeholder="Escribe una nueva contraseña" required> 
                        <input type="hidden" id="passwordActual" name="passwordActual">
                      </div>
                    </div>
                    <!-- EDITAR CONTRASEÑA FIN -->
                    <!-- EDITAR PERFIL -->
                    <div class="form-group">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-users"></i></span>
                        <select class="form-control input-lg" name="editarPerfil" id="">
                          <option value="" id="editarPerfil"></option>
                          <option value="Administrador">Administrador</option>
                          <option value="Callcenter">Call Center</option>
                          <option value="Ventas">Vendedor</option>
                        </select>
                      </div>
                    </div>
                    <!-- INGRESAR PERFIL FIN -->
                    <!-- EDITAR FOTO-PERFIL -->
                    <div class="form-group">
                      <div class="panel">Subir foto</div>
                      <!-- <input type="file" id="nuevaFoto" class="nuevaFoto" name="nuevaFoto"> -->
                      <input type="file" class="nuevaFoto"  name="editarFoto">
                      <p class="help-block">Peso máximo de la foto 2MB</p>
                      <img src="vistas/img/usuarios/default/anonymous.png" class="img-thumbnail previsualizar" width="100px" alt="imagen muestra">
                      <input type="hidden" name="fotoActual" id="fotoActual">
                    </div>
                    <!-- EDITAR FOTO-PERFIL FIN -->
                  </div>
                </div>
                <!-- PIE DE MODAL -->
                <div class="modal-footer">
                  <button type="button" class="btn btn-default pull-left" data-dismiss="modal">salir</button>
                  <button type="submit" class="btn btn-primary">Modificar usuario</button>
                </div>

                <?php
                  $editarUsuario = new ControladorUsuarios();
                  $editarUsuario -> ctrEditarUsuario();

                ?> 

            </form>
          </div>
        </div>
      </div><!-- FIN MODAL AGREGAR USUARIOS -->

      




      <!-- /.box-body -->
      <div class="box-footer">
        Administración de usuarios
      </div>
      <!-- /.box-footer-->
    </div>
    <!-- /.box -->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->