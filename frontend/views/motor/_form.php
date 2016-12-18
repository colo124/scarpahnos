<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\models\Cliente;


/* @var $this yii\web\View */
/* @var $model app\models\Motor */
/* @var $form yii\widgets\ActiveForm */

?>

    <?php
        $models = Cliente::find()->asArray()->all();
        $map = ArrayHelper::map($models, 'id', 'nombre'); // (where 'id' becomes the value and 'name' the name of the value which will be displayed)
    ?>

<div class="motor-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'frmUpload']]); ?>
    <input type="hidden" id="imageUrl" name="imageUrl" value="">
    <?= $form->field($model, 'fk_cliente')->dropDownList($map) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp')->textInput() ?>

    <?= $form->field($model, 'rpm')->textInput() ?>

    <?= $form->field($model, 'imagen')->fileInput() ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onClick'=>'uploadBeforeSumbit();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
