<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=pez">Pez</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-empleado" action="?c=pez&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>ID Pez</label>
      <input type="text" name="ID_Pez " value="<?php echo $pvd->ID_Pez ; ?>" class="form-control" placeholder="Ingrese id pez" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Peso</label>
        <input type="number" name="Peso" value="<?php echo $pvd->Peso; ?>" class="form-control" placeholder="Ingrese peso" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Tipo</label>
        <input type="text" name="Tipo" value="<?php echo $pvd->Tipo; ?>" class="form-control" placeholder="Ingrese tipo" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Talla</label>
        <input type="number" name="Talla" value="<?php echo $pvd->Talla; ?>" class="form-control" placeholder="Ingrese talla" data-validacion-tipo="requerido|min:10" />
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