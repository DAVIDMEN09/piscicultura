<h1 class="page-header">Consumidores </h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=comsumidor&a=Nuevo">Nuevo Consumidor</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id Consumidor</th>
            <th style="width:120px;">Edad</th>
            <th style="width:120px;">Dirección</th>
            <th style="width:120px;">Nombre</th>
            <th style="width:120px;">Descripción</th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->Listar() as $r): ?>
        <tr>
            <td><?php echo $r->ID_Consumidor; ?></td>
            <td><?php echo $r->Edad; ?></td>
            <td><?php echo $r->Dirección; ?></td>
            <td><?php echo $r->Nombre; ?></td>
            <td><?php echo $r->Teléfono; ?></td>
            <td>
                <a class="btn btn-success" href="?c=comsumidor&a=Crud&ID_Consumidor=<?php echo $r->ID_Consumidor; ?>"><ion-icon name="create-outline"></ion-icon></a>
            </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=comsumidor&a=Eliminar&ID_Consumidor=<?php echo $r->ID_Consumidor; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
