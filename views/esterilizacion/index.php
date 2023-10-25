<?php

use yii\helpers\Url;
use yii\bootstrap5\Html;

/** @var array $esterilizacion */
?>

<h1>Lista de productos</h1>

<div>
<a href="index.php?r=esterilizacion/create" class="btn btn-primary">Nuevo Registro de Esterilizacion</a>
</div>

<table class="table">
    <thead>
        <th>ID Esterilizacion</th>
        <th>Nombre</th>
        <th>Tatuaje</th>
        <th>Especie</th>
        <th>Dueño</th>
        <th>Resultado</th>
        <th></th>
    </thead>
    <tbody>
        <?php foreach($esterilizacion as $row): ?>
        <tr>
            <td> <?= $row['id'] ?> </td>
            <td> <?= $row['nombre'] ?> </td>
            <td> 
                <a href="index.php?r=producto/view&id=<?= $row['id'] ?>"  ><i class="fa-solid fa-eye"></i></a>
                <a href="index.php?r=producto/update&id=<?= $row['id'] ?>"  ><i class="fa-solid fa-pencil"></i></a>

                <?= Html::a('<i class="fa-solid fa-trash-can"></i>', ['producto/delete', 'id' => $row['id']], ['data-confirm' => 'Desea eliminar el producto?']) ?>

            </td>
        </tr>
        <?php endforeach ?>
    </tbody>
</table>