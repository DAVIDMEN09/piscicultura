<h1 class="page-header">
    <?php echo $prod->ID_Consumidor != null ? $prod->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=comsumidor">Consumidores</a></li>
  <li class="active"><?php echo $prod->ID_Consumidor != null ? $prod->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-comsumidor" action="?c=comsumidor&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID_Consumidor" value="<?php echo $prod->ID_Consumidor; ?>" />

    <div class="form-group">
        <label>Edad</label>
        <input type="text" name="Edad" value="<?php echo $prod->Edad; ?>" class="form-control" placeholder="Ingrese la edad" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Dirección</label>
        <input type="text" name="Dirección" value="<?php echo $prod->Dirección; ?>" class="form-control" placeholder="Ingrese la direccion" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $prod->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Teléfono</label>
        <input type="text" name="Teléfono" value="<?php echo $prod->Teléfono; ?>" class="form-control" placeholder="Ingrese el telefono" data-validacion-tipo="requerido|min:240" />
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Actualizar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-comsumidor").submit(function(){
            return $(this).validate();
        });
    })
</script>