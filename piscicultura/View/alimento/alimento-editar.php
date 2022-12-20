<h1 class="page-header">
    <?php echo $pvd->ID_Alimento  != null ? $pvd->Nombre : 'Nuevo Registro'; ?>
</h1>

<ol class="breadcrumb">
  <li><a href="?c=alimento">Alimentos</a></li>
  <li class="active"><?php echo $pvd->ID_Alimento  != null ? $pvd->Nombre : 'Nuevo Registro'; ?></li>
</ol>

<form id="frm-empleado" action="?c=alimento&a=Editar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID_Alimento " value="<?php echo $pvd->ID_Alimento; ?>" />

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $pvd->Nombre; ?>" class="form-control" placeholder="Ingrese Nombre alimento" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Tipo</label>
        <input type="text" name="Tipo" value="<?php echo $pvd->Tipo; ?>" class="form-control" placeholder="Ingrese tipo alimento" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Etapa</label>
        <input type="text" name="Etapa" value="<?php echo $pvd->Etapa; ?>" class="form-control" placeholder="Ingrese etapa de alimentacion" data-validacion-tipo="requerido|min:10" />
    </div>

    <div class="form-group">
        <label>Id Proveedor</label>
        <select name="ID_Proveedor" id="ID_Proveedor" class="form-label">
            <?php $id = $pvd->Nombre;?>
        <?php  require_once 'model/proveedor.php';?>
        <?php foreach($this->modelo->Listar() as $r):  
            if ($r->ID_Proveedor = $id):?>
        <option value="<?php echo $r->ID_Proveedor;?>"><?php echo $r->Nombre;?></option>
        <?php endif ?>
        <?php endforeach;?>
<!-- 
        <?php foreach($this->modelo->Listar() as $k):?>
            <option value="<?php echo $k->ID_Proveedor;?>"><?php echo $k->Nombre;?></option>
        <?php endforeach;?> -->

        </select>

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