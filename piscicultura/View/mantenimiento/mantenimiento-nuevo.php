<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=mantenimiento">Registrar Mantenimiento</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-mantenimiento" action="?c=mantenimiento&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="codManteni" value="" />
    <div class="form-group">
        <label>Fecha Mantenimiento</label>
        <input type="date" name="Fecha_Mantenimiento" value="<?php echo $pvd->Fecha_Mantenimiento; ?>" class="form-control" placeholder="Ingrese su correo" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Id Empleado</label>
        <div>
        <select name="ID_Empleado" id="ID_Empleado" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/empleado.php';
        ?>
        
        <?php foreach($this->modeloEm->ListarE() as $r): ?>
            <option value="<?php echo $r->ID_Empleado;?>"><?php echo $r->Nombre;?></option>
        <?php endforeach;?>
        </select>
        </div>
    </div>

    <div class="form-group">
        <label>Id Estanque</label>
        <div>
        <select name="ID_Estanque" id="ID_Estanque" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/estanque.php';
        ?>
        
        <?php foreach($this->modeloEs->ListarEs() as $r): ?>
            <option value="<?php echo $r->ID_Estanque;?>"><?php echo $r->ID_Estanque;?></option>
        <?php endforeach;?>
        </select>
        </div>
    </div> 
    <div class="form-group">
        <label>Id Pez</label>
        <div>
        <select name="ID_Pez" id="ID_Pez" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/pez.php';
        ?>
        
        <?php foreach($this->modeloP->ListarP() as $r): ?>
            <option value="<?php echo $r->ID_Pez;?>"><?php echo $r->Tipo;?></option>
        <?php endforeach;?>
        </select>
        </div>
        
    </div> 

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-mantenimiento").submit(function(){
            return $(this).validate();
        });
    })
</script>