<h1 class="page-header">
    Nuevo Registro
</h1>

<ol class="breadcrumb">
  <li><a href="?c=alimento">Alimento</a></li>
  <li class="active">Nuevo Registro</li>
</ol>

<form id="frm-empleado" action="?c=alimento&a=Guardar" method="post" enctype="multipart/form-data">

    <div class="form-group">
      <label>ID Alimento</label>
      <input type="int" name="ID_Alimento" value="<?php echo $pvd->ID_Alimento;?>" class="form-control" placeholder="Ingrese id del alimento" data-validacion-tipo="requerido|min:20" />
    </div>

    <div class="form-group">
        <label>Nombre</label>
        <input type="text" name="Nombre" value="<?php echo $pvd->Nombre; ?>" class="form-control" placeholder="Ingrese el nombre" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Tipo</label>
        <input type="text" name="Tipo" value="<?php echo $pvd->Tipo; ?>" class="form-control" placeholder="Ingrese el tipo" data-validacion-tipo="requerido|min:100" />
    </div>

    <div class="form-group">
        <label>Etapa</label>
        <input type="text" name="Etapa" value="<?php echo $pvd->Etapa; ?>" class="form-control" placeholder="Ingrese la etapa" data-validacion-tipo="requerido|min:10" />
    </div>
       
   
    <div class="form-group">
        <label>Id Proveedor</label>
        <select name="ID_Proveedor" id="ID_Proveedor" class="form-label">
        <option value="0"> -- Seleccione--</option>
        <?php  require_once 'model/proveedor.php';
        ?>
        
        <?php foreach($this->modelo->Listar() as $r): ?>
            <option value="<?php echo $r->ID_Proveedor;?>"><?php echo $r->Nombre;?></option>
        <?php endforeach;?>
        </select>
    </div>

    <hr />

    <div class="text-right">
        <button class="btn btn-success">Guardar</button>
    </div>
</form>

<script>
    $(document).ready(function(){
        $("#frm-alimento").submit(function(){
            return $(this).validate();
        });
    })
</script>