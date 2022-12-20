<h1 class="page-header">Alimentacion</h1>

<div class="well well-sm text-right">
<a class="btn btn-primary" href="?c=alimentacion&a=Nuevo">Nuevo registro alimentacion</a>
    <a class="btn btn-primary" href="?c=alimento">Registros Alimento</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id Alimento</th>
            <th style="width:120px;">Fecha alimentacion</th>
            <th style="width:120px;">Estanque</th>
            <th style="width:120px;">Tipo pez</th>
            <th style="width:120px;">Proveedor</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->CodAlimentacion; ?></td>
            <td><?php echo $r->Fecha_alimentacion; ?></td>
            <td><?php echo $r->ID_Estanque; ?></td>
            <td><?php echo $r->ID_Pez; ?></td>
            <td><?php echo $r->ID_Alimento; ?></td>
            <td>
            
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=alimento&a=Eliminar&CodAlimentacion=<?php echo $r->CodAlimentacion; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>