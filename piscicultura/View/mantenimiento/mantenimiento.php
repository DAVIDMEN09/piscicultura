<h1 class="page-header">Mantenimientos realizados a los estanques</h1>
<form method="POST">
    <div class="mb-1 d-grid">
        <div class="">

            <label for="tipo" class="form-label col-1 mx-2">Buscar Mantenimiento</label>

            <input type="text" name="codigo" class="form-control" placeholder="Ingrese el codigo a buscar"/>

            <div class="col-1">
                    <button name="buscar" type="submit" class="btn btn-primary abs-center">Buscar</button>
            </div>
        </div>
    </div>
</form>
<div class="well well-sm text-right">
    <a class="btn btn-primary" href="?c=mantenimiento&a=Nuevo">Registar nuevo mantenimiento</a>
    <a class="btn btn-primary" href="?c=estanque">Estanques registrados</a>
</div>



<table class="table table-striped">
    <thead>
        <tr>
            <th style="width:180px;">codigo manteniiento</th>
            <th style="width:120px;">Dia Mantenimiento</th>
            <th style="width:120px;">Empleado</th>
            <th style="width:120px;">Estanque </th>
            <th style="width:120px;">Pez</th>
        </tr>
    </thead>
    <tbody>
<?php
$col = $_REQUEST['codigo'] ?? null;

if ($col == null || $col == 0): ?>
    <?php foreach($this->model->Listar() as $r): ?>
    <tr>
            <td><?php echo $r->codManteni; ?></td>
            <td><?php echo $r->Fecha_Mantenimiento; ?></td>
            <td><?php echo $r->ID_Empleado; ?></td>
            <td><?php echo $r->ID_Estanque; ?></td>
            <td><?php echo $r->ID_Pez; ?></td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=mantenimiento&a=Eliminar&codManteni=<?php echo $r->codManteni; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>
        <?php endforeach; ?>
<?php else: ?>
    <!-- <tr>

            <td> 12</td>
            <td>12/12/2000</td>
            <td>12</td>
            <td>4</td>
            <td>24</td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=mantenimiento&a=Eliminar&codManteni=<?php echo $r->codManteni; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td> -->
    <?php 
    $p = $this->model->Buscar($col)  ?>
        <tr>
            <td><?php echo $p->codManteni; ?></td>
            <td><?php echo $p->Fecha_Mantenimiento; ?></td>
            <td><?php echo $p->ID_Empleado; ?></td>
            <td><?php echo $p->ID_Estanque; ?></td>
            <td><?php echo $p->ID_Pez; ?></td>
            <td>
                <a class="btn btn-danger" onclick="javascript:return confirm('¿Seguro de eliminar este registro?');" href="?c=mantenimiento&a=Eliminar&codManteni=<?php echo $p->codManteni; ?>"><ion-icon name="trash-outline"></ion-icon></a>
            </td>
        </tr>


<?php endif ?>
    </tbody>
</table>