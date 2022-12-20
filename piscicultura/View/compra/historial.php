<h1 class="page-header">Historial</h1>

<div class="well well-sm text-right">
<a class="btn btn-primary" href="?c=compra">registro compra</a>
<a class="btn btn-primary" href="?c=empleado">Registros empleados</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">fecha Eliminacion</th>
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
    <?php foreach($this->model->ListarHistorial() as $r): ?>
        <tr>
            <td><?php echo $r->fecha_eliminacion; ?></td>
            <td><?php echo $r->ID_Compra; ?></td>
            <td><?php echo $r->Fecha_Compra; ?></td>
            <td><?php echo $r->Precio; ?></td>
            <td><?php echo $r->Cantidad_kg; ?></td>
            <td><?php echo $r->Total_Compra; ?></td>
            <td><?php echo $r->ID_Pez; ?></td>
            <td><?php echo $r->ID_Consumidor; ?></td>
            <td><?php echo $r->ID_Empleado; ?></td>
            <td>
            
                <a class="btn btn-success" onclick="javascript:return confirm('¿seguro que desea resuperar este registro?');" href="?c=compra&a=recuperar&ID_Compra=<?php echo $r->ID_Compra; ?>">Recuperar</a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>