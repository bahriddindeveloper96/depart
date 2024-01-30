<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Disorder */

$this->title = 'Yangilash: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Disorders', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="disorder-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
