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
    <canvas id="canvas" width="800" height="600" style="display: none;"></canvas>
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data','id'=>'frmUpload']]); ?>
    <input type="hidden" id="imageUrl" name="imageUrl" value="">
    <?= $form->field($model, 'fk_cliente')->dropDownList($map) ?>

    <?= $form->field($model, 'marca')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hp')->dropDownList([
                                                    '0.5' => 0.5,
                                                    '1' => 1,
                                                    '1.5' => 1.5, 
                                                    '2' => 2, 
                                                    '3' => 3, 
                                                    '4' => 4,
                                                    '5' => 5, 
                                                    '5.5' => 5.5, 
                                                    '7.5' => 7.5, 
                                                    '10'  => 10,  
                                                    '12.5' => 12.5,   
                                                    '15'  => 15,  
                                                    '20'  =>20,   
                                                    '25'  =>25,   
                                                    '30'  =>30,   
                                                    '40'  =>40,   
                                                    '50'  =>50,   
                                                    '60'  =>60,   
                                                    '75'  =>75,   
                                                    '100' =>100,  
                                                    '125' =>125,  
                                                    '150' =>150,  
                                                    '175' =>175,  
                                                    '200' =>200]); ?>

    <?= $form->field($model, 'rpm')->dropDownList([
                                                    1500 => 1500,
                                                    2800 =>2800,
                                                    900 => 900]); ?>

    <?= $form->field($model, 'imagen')->fileInput() ?>

    <?= $form->field($model, 'descripcion')->textArea(['maxlength' => true, 'rows' => '6']) ?>

    <?= $form->field($model, 'estado')->dropDownList([
                                                    'Para hacer' => 'Para hacer',
                                                    'Hecho' =>'Hecho',
                                                    'En espera' => 'En espera']); ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary','onClick'=>'uploadBeforeSumbit();']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
