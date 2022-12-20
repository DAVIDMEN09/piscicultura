<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=compra">Compras</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-compra" action="?c=compra&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="ID_Compra" value=""/>

    <div class="form-group">
        <label>Fecha compra</label>
        <input type="date" name="Fecha_Compra" value="<?php echo $pvd->Fecha_Compra; ?>" class="form-control" placeholder="Ingrese la fecha" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>precio</label>
        <input type="decimal" name="Precio" value="<?php echo $pvd->Precio; ?>" class="form-control" placeholder="Ingrese el precio" data-validacion-tipo="requerido|min:100" />
    </div> 

    <div class="form-group">
        <label>Cantidad kilos</label>
        <input type="int" name="Cantidad_kg" value="<?php echo $pvd->Cantidad_kg; ?>" class="form-control" placeholder="Ingrese kilos" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Pez</label>
        <div>
        <select name="ID_Pez" id="ID_Pez" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/pez.php';
        ?>
        
        <?php foreach($this->modelPe->ListarP() as $r): ?>
            <option value="<?php echo $r->ID_Pez;?>"><?php echo $r->Tipo;?></option>
        <?php endforeach;?>
        </select>
        </div>
    </div>
       
    <div class="form-group">
        <label>Estanque</label>
        <div>
        <select name="ID_Estanque" id="ID_Estanque" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/estanque.php';
        ?>
        
        <?php foreach($this->modelEs->ListarEs() as $r): ?>
            <option value="<?php echo $r->ID_Estanque;?>"><?php echo $r->ID_Estanque;?></option>
        <?php endforeach;?>
        </select>
        </div>
    </div>
   
    <div class="form-group">
        <label>Consumidor</label>
        <div>
        <select name="ID_Consumidor" id="ID_Consumidor" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/comsumidor.php';
        ?>
        
        <?php foreach($this->modelCon->Listar() as $r): ?>
            <option value="<?php echo $r->ID_Consumidor;?>"><?php echo $r->Nombre;?></option>
        <?php endforeach;?>
        </select>
        </div>
    </div>

    
    <div class="form-group">
        <label>Empleado</label>
        <div>
        <select name="ID_Empleado" id="ID_Empleado" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/empleado.php';
        ?>
        
        <?php foreach($this->modelEm->ListarE() as $r): ?>
            <option value="<?php echo $r->ID_Empleado;?>"><?php echo $r->Nombre;?></option>
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
        $("#frm-compra").submit(function(){
            return $(this).validate();
        });
    })
</script>