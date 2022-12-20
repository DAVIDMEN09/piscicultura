<h1 class="page-header">Peces</h1>

<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=pez&a=Nuevo">Nuevo Pez</a>
</div>

<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">Id Pez</th>
            <th style="width:120px;">Peso</th>
            <th style="width:120px;">Tipo</th>
            <th style="width:120px;">Talla </th>
        </tr>
    </thead>
    <tbody>
    <?php foreach($this->model->ListarP() as $r): ?>
        <tr>
            <td><?php echo $r->ID_Pez; ?></td>
            <td><?php echo $r->Peso; ?></td>
            <td><?php echo $r->Tipo; ?></td>
            <td><?php echo $r->Talla ; ?></td>
            <td>
                <a class="btn btn-success" href="?c=pez&a=Crud&ID_Pez=<?php echo $r->ID_Pez; ?>"><ion-icon name="create-outline"></ion-icon></a>
                </td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=pez&a=Eliminar&ID_Pez=<?php echo $r->ID_Pez; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>