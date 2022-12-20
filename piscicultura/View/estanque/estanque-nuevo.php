<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=estanque">Proveedores</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-estanque" action="?c=estanque&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>ID Estanque</label>
      <input type="int" name="ID_Estanque" value="<?php echo $pvd->ID_Estanque;?>" class="form-control" placeholder="Ingrese idestanque" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Profundidad</label>
        <input type="decimal" name="Profundidad" value="<?php echo $pvd->Profundidad; ?>" class="form-control" placeholder="Ingrese profundidad" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Longitud</label>
        <input type="decimal" name="Longitud" value="<?php echo $pvd->Longitud; ?>" class="form-control" placeholder="Ingrese longuitud" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Capacidad</label>
        <input type="float" name="Capacidad" value="<?php echo $pvd->Capacidad; ?>" class="form-control" placeholder="Ingrese capaciudad" data-validacion-tipo="requerido|min:10" />
    </div> 
    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-estanque").submit(function(){
            return $(this).validate();
        });
    })
</script>