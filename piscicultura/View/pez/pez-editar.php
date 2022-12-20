<h1 class="page-header">
    <?php echo "Bienvenido a la vista de peces";?>
    <?php echo $pvd->ID_Pez  != null ? $pvd->Tipo : 'Nuevo Registro'; ?>
    <?php echo "actualizar sus datos";?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=pez">Peces</a></li>
  <li class="active"><?php echo $pvd->ID_Pez  != null ? $pvd->Tipo : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-pez" action="?c=pez&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID_Pez" value="<?php echo $pvd->ID_Pez; ?>" />

    <div class="form-group">
        <label>Peso</label>
        <input type="text" name="Peso" value="<?php echo $pvd->Peso; ?>" class="form-control" placeholder="Ingrese peso" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Tipo</label>
        <input type="text" name="Tipo" value="<?php echo $pvd->Tipo; ?>" class="form-control" placeholder="Ingrese tipo" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Talla</label>
        <input type="text" name="Talla" value="<?php echo $pvd->Talla; ?>" class="form-control" placeholder="Ingrese talla" data-validacion-tipo="requerido|min:10" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-pez").submit(function(){
            return $(this).validate();
        });
    })
</script>