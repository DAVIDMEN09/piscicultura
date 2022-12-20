<h1 class="page-header">Alimentos</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=alimento&a=Nuevo">Nuevo Alimento</a>
    <a class="btn btn-primary" href="?c=alimentacion">Alimentacion peces</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id Alimento</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Tipo </th>
            <th style="width:120px;">Etapa</th>
            <th style="width:120px;">ID_Proveedor</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListarA() as $r): ?>
        <tr>
            <td><?php echo $r->ID_Alimento; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Tipo; ?></td>
            <td><?php echo $r->Etapa; ?></td>
            <td><?php echo $r->ID_Proveedor; ?></td>
            <td>
                <a class="btn btn-success" href="?c=alimento&a=Crud&ID_Alimento=<?php echo $r->ID_Alimento; ?>"><ion-icon name="create-outline"></ion-icon></a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=alimento&a=Eliminar&ID_Alimento=<?php echo $r->ID_Alimento; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>