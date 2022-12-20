<h1 class="page-header">
    <?php echo $pvd->ID_Empleado != null ? $pvd->Area : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=empleado">Proveedores</a></li>
  <li class="active"><?php echo $pvd->ID_Empleado != null ? $pvd->Area : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-empleado" action="?c=empleado&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID_Empleado" value="<?php echo $pvd->ID_Empleado; ?>" />

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
        <input type="text" name="Telefono" value="<?php echo $pvd->Telefono; ?>" class="form-control" placeholder="Ingrese  telefono" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="Dirección" value="<?php echo $pvd->Dirección; ?>" class="form-control" placeholder="Ingrese direcion" data-validacion-tipo="requerido|min:10" />
    </div>
    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $pvd->Nombre; ?>" class="form-control" placeholder="Ingrese nombree" data-validacion-tipo="requerido|min:10" />
    </div>
    <div class="form-group">
        <label>Sexo</label>
        <input type="text" name="Sexo" value="<?php echo $pvd->Sexo; ?>" class="form-control" placeholder="Ingrese sexo" data-validacion-tipo="requerido|min:10" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-empleado").submit(function(){
            return $(this).validate();
        });
    })
</script>
