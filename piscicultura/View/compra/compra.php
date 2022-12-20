<h1 class="page-header">compras</h1>




<div class="well well-sm text-right">
<a class="btn btn-primary" href="?c=compra&a=Nuevo">Nuevo registro compra</a>
<a class="btn btn-primary" href="?c=compra&a=historial">Papelera compras</a>
    <a class="btn btn-primary" href="?c=empleado">Registros empleados</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id compra</th>
            <th style="width:120px;">Fecha compra</th>
            <th style="width:120px;">Precio unidad</th>
            <th style="width:120px;">Cantidad</th>
            <th style="width:120px;">Total compra</th>
            <th style="width:120px;">Pez</th>
            <th style="width:120px;">Comprador</th>
            <th style="width:120px;">Empleado</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->ID_Compra; ?></td>
            <td><?php echo $r->Fecha_Compra; ?></td>
            <td><?php echo $r->Precio; ?></td>
            <td><?php echo $r->Cantidad_kg; ?></td>
            <td><?php echo $r->Total_Compra; ?></td>
            <td><?php echo $r->ID_Pez; ?></td>
            <td><?php echo $r->ID_Consumidor; ?></td>
            <td><?php echo $r->ID_Empleado; ?></td>
            <td>
            
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=compra&a=Eliminar&ID_Compra=<?php echo $r->ID_Compra; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>