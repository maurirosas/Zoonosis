<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/** @var \app\models\AnimalForm $model */

?>

<h1>Nuevo Animal</h1>


<?php $form = ActiveForm::begin() ?>

<?= $form->field($model, 'nombre') -> textInput()?>

<?= $form->field($model, 'genero')->dropDownList(['M' => 'Macho', 'F' => 'Hembra']) ?>

<?= $form->field($model, 'direccion')->textInput() ?>

<?= $form->field($model, 'tipo_dueno')->dropDownList(['1' => 'Particular', '2' => 'Refugio', '3' => 'Representante']) ?>

<?= $form->field($model, 'edad')->textInput() ?>

<?= $form->field($model, 'especie')->textInput() ?>

<div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>

<?php $form->end()?>