<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use common\models\User;
use yii\bootstrap4\Breadcrumbs;

/** @var yii\web\View $this */
/** @var common\models\embargo\Embargo $model */

$this->title = Yii::t('app', 'Tahrirlash Taqiqlash ko\'rsatmasi: {name}', [
    'name' => $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Taqiqlash ko\'rsatmasi'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Tahrirlash');
?>
<div class="embargo-update">
<?php
            echo Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                 'options' => [
                'class' => 'breadcrumb float-sm-right'
                        ]
                ]);
            ?>

<div class="embargo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'instructions_id')->dropdownList([
        $model['instructions_id'] => $model->instruction->command_number
    ]);?>

    <?= $form->field($model, 'companies_id')->dropdownList([
        $model['companies_id'] => $model->company->name
    ]);?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->dropdownList([                           
        '0' => 'Jarayonda',
        '1' => 'Tasdiqlangan',
        '2' => 'Bekor qilingan',
        
            ]
    );?>

    
    <?= $form->field($model, 'updated_by')->dropdownList([                           
                          User::findOne(Yii::$app->user->id)->id => User::findOne(Yii::$app->user->id)->name . ' ' . User::findOne(Yii::$app->user->id)->surname
                          
                          ]);?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>
