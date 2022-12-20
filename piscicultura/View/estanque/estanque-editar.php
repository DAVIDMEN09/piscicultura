<h1 class="page-header">
    <?php echo $pvd->ID_Estanque  != null ? $pvd->ID_Estanque : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=estanque">Proveedores</a></li>
  <li class="active"><?php echo $pvd->ID_Estanque  != null ? $pvd->ID_Estanque : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-estanque" action="?c=estanque&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID_Estanque" value="<?php echo $pvd->ID_Estanque; ?>" />

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
        <input type="float" name="Capacidad" value="<?php echo $pvd->Capacidad; ?>" class="form-control" placeholder="Ingrese capacidad" data-validacion-tipo="requerido|min:10" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-estanque").submit(function(){
            return $(this).validate();
        });
    })
</script>