<?php

/* @var $this yii\web\View */
/* @var $model Instruction */

use common\models\caution\Instruction;
use frontend\widgets\StepsCautions;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;

$this->title = 'Davlat nazoratini o\'tkazish uchun asos';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="page1-1 row ">

    <?= StepsCautions::widget([
        'caution_instruction_id' => null,
        'caution_company_id' => null,
    ]) ?>

    <?php $form = ActiveForm::begin() ?>

    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'base')->dropDownList(Instruction::getType()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'letter_date')->widget(DatePicker::className()) ?>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'letter_number')->textInput() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <input type="submit" class="btn btn-info br-btn" value="Saqlash">
        </div>
    </div>

    <?php ActiveForm::end() ?>
</div>