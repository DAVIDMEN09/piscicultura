<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=empleado">Proveedores</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-empleado" action="?c=empleado&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>ID Empleado</label>
      <input type="text" name="ID_Empleado" value="<?php echo $pvd->ID_Empleado; ?>" class="form-control" placeholder="Ingrese id empleado" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Area</label>
        <input type="text" name="Area" value="<?php echo $pvd->Area; ?>" class="form-control" placeholder="Ingrese area trabajo" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Edad</label>
        <input type="text" name="Edad" value="<?php echo $pvd->Edad; ?>" class="form-control" placeholder="Ingrese edad" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Telefono</label>
        <input type="text" name="Telefono" value="<?php echo $pvd->Telefono; ?>" class="form-control" placeholder="Ingrese telefono " data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="Dirección" value="<?php echo $pvd->Dirección; ?>" class="form-control" placeholder="Ingrese direccion" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $pvd->Nombre; ?>" class="form-control" placeholder="Ingrese nombre" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Sexo</label>
        <input type="text" name="Sexo" value="<?php echo $pvd->Sexo; ?>" class="form-control" placeholder="Ingrese sexo" data-validacion-tipo="requerido|min:10" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-empleado").submit(function(){
            return $(this).validate();
        });
    })
</script>
