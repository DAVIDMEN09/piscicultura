<h1 class="page-header">Empleados</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=empleado&a=Nuevo">Nuevo Empleado</a>
    <a class="btn btn-primary" href="?c=compra">Informacion compras</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id Producto</th>
            <th style="width:120px;">Area</th>
            <th style="width:120px;">Nombre </th>
            <th style="width:120px;">Edad</th>
            <th style="width:120px;">Sexo</th>
            <th style="width:120px;">Telefono</th>
            <th style="width:120px;">Direccion</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListarE() as $r): ?>
        <tr>
            <td><?php echo $r->ID_Empleado; ?></td>
            <td><?php echo $r->Area; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Edad; ?></td>
            <td><?php echo $r->Sexo; ?></td>
            <td><?php echo $r->Telefono; ?></td>
            <td><?php echo $r->Dirección; ?></td>
            <td>
                <a class="btn btn-success" href="?c=empleado&a=Crud&ID_Empleado=<?php echo $r->ID_Empleado; ?>"><ion-icon name="create-outline"></ion-icon></a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=empleado&a=Eliminar&ID_Empleado=<?php echo $r->ID_Empleado; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
