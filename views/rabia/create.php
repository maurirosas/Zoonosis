<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var \app\models\RabiaForm $model */

?>

<h1>Nuevo Registro de Rabia</h1>


<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'municipio') -> textInput()?>

<?= $form->field($model, 'area')->dropDownList(['0' => 'Urbano', '1' => 'Rural']) ?>

<?= $form->field($model, 'json')->textInput() ?>

<?= $form->field($model, 'id_dueno')->textInput() ?>

<?= $form->field($model, 'id_animal')->textInput() ?>

<div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>

<?php $form->end()?>