<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

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
                        'confirm' => 'Esta seguro de borrar el cliente?',
                        'method' => 'post',
                    ],
                ]) ?>
        </div>
    </div><br>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombre',
            'cuit',
            'telefono',
            'email:email',
            'direccion',
        ],
    ]) ?>

</div>
