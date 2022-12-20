<h1 class="page-header">
    <?php echo $pvd->ID_Proveedor  != null ? $pvd->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=mantenimiento">mantenimientos de los estanques</a></li>
  <li class="active"><?php echo $pvd->ID_Proveedor  != null ? $pvd->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-mantenimiento" action="?c=mantenimiento&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID_Proveedor" value="<?php echo $pvd->ID_Proveedor; ?>" />

    <div class="form-group">
        <label>Correo</label>
        <input type="text" name="Correo" value="<?php echo $pvd->Correo; ?>" class="form-control" placeholder="Ingrese su correo" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $pvd->Nombre; ?>" class="form-control" placeholder="Ingrese su nombre" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="Dirección" value="<?php echo $pvd->Dirección; ?>" class="form-control" placeholder="Ingrese su direccion" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="Teléfono" value="<?php echo $pvd->Teléfono; ?>" class="form-control" placeholder="Ingrese teléfono proveedor" data-validacion-tipo="requerido|min:10" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-mantenimiento").submit(function(){
            return $(this).validate();
        });
    })
</script>