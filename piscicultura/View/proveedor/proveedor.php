<h1 class="page-header">Proveedores</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=proveedor&a=Nuevo">Nuevo Proveedor</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id proveedor</th>
            <th style="width:120px;">Correo</th>
            <th style="width:120px;">Nombre </th>
            <th style="width:120px;">Dirección</th>
            <th style="width:120px;">Teléfono</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->ID_Proveedor; ?></td>
            <td><?php echo $r->Correo; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Dirección; ?></td>
            <td><?php echo $r->Teléfono; ?></td>
            <td>
                <a class="btn btn-success" href="?c=proveedor&a=Crud&ID_Proveedor=<?php echo $r->ID_Proveedor; ?>"><ion-icon name="create-outline"></ion-icon></a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=proveedor&a=Eliminar&ID_Proveedor=<?php echo $r->ID_Proveedor; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>