<?php

/** @var \app\models\domain\entity\Animal $model */

?>

<h1>Animal <?= $model->id_animal?></h1> 

<table class="table">
    <tbody>
        <tr>
            <td> ID </td>
            <td> <?= $model->id_animal ?> </td>
        </tr>
        <tr>
            <td> Nombre </td>
            <td> <?= $model->nombre_animal ?> </td>
        </tr>
        <tr>
            <td> Genero </td>
            <td> <?= $model->genero ?> </td>
        </tr>
        <tr>
            <td> Direccion </td>
            <td> <?= $model->zona_direccion?> </td>
        </tr>
        <tr>
            <td> Tipo de Dueño </td>
            <td> <?= $model-> tipo_dueno ?> </td>
        </tr>
        <tr>
            <td> Edad </td>
            <td> <?= $model-> edad ?> </td>
        </tr>
        <tr>
            <td> Especie </td>
            <td> <?= $model-> especie ?> </td>
        </tr>

    </tbody>
</table>