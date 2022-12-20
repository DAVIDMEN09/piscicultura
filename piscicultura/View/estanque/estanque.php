<h1 class="page-header">Listado de estanques realizados</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=estanque&a=Nuevo">Registrar nuevo estanque</a>
    <a class="btn btn-primary" href="?c=mantenimiento">Mantenimientos Estanques</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:120px;">Id estanque</th>
            <th style="width:120px;">Profundidad </th>
            <th style="width:120px;">Longitud</th>
            <th style="width:120px;">Capacidad</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListarEs() as $r): ?>
        <tr>
            <td><?php echo $r->ID_Estanque; ?></td>
            <td><?php echo $r->Profundidad; ?></td>
            <td><?php echo $r->Longitud; ?></td>
            <td><?php echo $r->Capacidad; ?></td>
            <td>
                <a class="btn btn-success" href="?c=estanque&a=Crud&ID_Estanque=<?php echo $r->ID_Estanque; ?>"><ion-icon name="create-outline"></ion-icon></a>
                </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=estanque&a=Eliminar&ID_Estanque=<?php echo $r->ID_Estanque; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>