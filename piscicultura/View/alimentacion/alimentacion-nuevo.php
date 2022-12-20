<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=alimentacion">alimentacion</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-alimentacion" action="?c=alimentacion&a=Guardar" method="post" enctype="multipart/form-data">
    <input type="hidden" name="CodAlimentacion" value=""/>

    <div class="form-group">
        <label>Fecha_alimentacion</label>
        <input type="date" name="Fecha_alimentacion" value="<?php echo $pvd->Fecha_alimentacion; ?>" class="form-control" placeholder="Ingrese la fecha" data-validacion-tipo="requerido|min:100" />
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
        <label>Alimento</label>
        <div>
        <select name="ID_Alimento" id="ID_Alimento" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/alimento.php';
        ?>
        
        <?php foreach($this->modelA->ListarA() as $r): ?>
            <option value="<?php echo $r->ID_Alimento;?>"><?php echo $r->Nombre;?></option>
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
        $("#frm-alimentacion").submit(function(){
            return $(this).validate();
        });
    })
</script>