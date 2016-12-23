<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Motor */

$this->params['breadcrumbs'][] = ['label' => 'Motors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-xs-9">
            <?= Html::a('Volver', ['index'], ['class' => 'btn btn-info']) ?>
        </div>
        <div class="col-xs-2">
             <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
                <?= Html::a('Borrar', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'data' => [
                        'confirm' => 'Esta seguro de borrar el motor?',
                        'method' => 'post',
                    ],
                ]) ?>
        </div>
    </div><br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'fk_cliente',
            [
               'attribute' => 'fk_cliente.name',
               'header' => 'cliente'
               'value'=> 'function ($model, $key, $index, $grid){
                   return $model->fk_cliente->name;
               }'
            ],
            'marca',
            'hp',
            'rpm',
            'imagen'=>[
                'attribute'=>'imagen',
                'value'=> $model->imagen,
                'format' => ['image',['width'=>'200']],
            ],
            'descripcion',
            'estado',
            'fecha',
        ],
    ]) ?>

</div>
