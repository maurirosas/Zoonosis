<?php

/** @var \app\models\domain\entity\Rabia $model */

?>

<h1>Registro N° <?= $model->id ?></h1> 

<table class="table">
    <tbody>
        <tr>
            <td> ID </td>
            <td> <?= $model->id ?> </td>
        </tr>
        <tr>
            <td> Municipio </td>
            <td> <?= $model->municipio ?> </td>
        </tr>
        <tr>
            <td> Area </td>
            <td> <?= $model->area ?> </td>
        </tr>
        <tr>
            <td> Fecha </td>
            <td> <?= $model->fecha_registro?> </td>
        </tr>
        <tr>
            <td> Json </td>
            <td> <?= $model-> json ?> </td>
        </tr>
        <tr>
            <td> ID Dueño </td>
            <td> <?= $model-> id_dueno ?> </td>
        </tr>
        <tr>
            <td> ID Animal </td>
            <td> <?= $model-> id_animal ?> </td>
        </tr>

    </tbody>
</table>