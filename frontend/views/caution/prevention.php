<?php

use common\models\control\Company;
use common\models\control\Instruction;
use frontend\models\StatusHelper;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel common\models\control\InstructionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */


$this->title = 'Korxonalar';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
    .pagination li a {
        padding: 2px 5px;
    }

    .pagination li.active {
        background-color: #1AB475;
    }

    .pagination li a {
        color: black;
    }

    .pagination li a:hover {
        background-color: grey;
    }
</style>
<div class="company-index m-5">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'headerRowOptions' => ['style' => 'background-color: #0072B5'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'label' => 'Hudud',
                'value' => function ($model) {
                    $company = Company::findOne(['control_instruction_id' => $model->id]);
                    // echo '<pre>';
                    // var_dump($company->region->name);die();
                    // echo '</pre>';
                    return $company ? $company->region->name : '';
                }
            ],
            [
                'label' => 'Xyus nomi',
                'value' => function ($model) {
                    $company = Company::findOne(['control_instruction_id' => $model->id]);
                    if ($company) {
                        return Html::a($company->name, ['/control/company-view', 'id' => $model->id], ['class' => 'text-primary']);
                    }
                    return '';
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Xyus inn',
                'value' => function ($model) {
                    $company = Company::findOne(['control_instruction_id' => $model->id]);
                    if ($company) {
                        return Html::a($company->inn, ['/control/company-view', 'id' => $model->id], ['class' => 'text-primary']);
                    }
                    return '';
                },
                'format' => 'raw',
            ],
            [   
                'label' => 'Buyruq nomeri',
                'value' => function (Instruction $model) {
                    return $model->command_number;
                }
            ],
            [
                'label' => 'Ko\'rsatmalar',
                'value' => function ($model) {
                    $company = Company::findOne(['control_instruction_id' => $model->id]);
                    if ($company) {
                        return Html::a('Batafsil', ['/caution/prevention-add', 'id' => $model->id], ['class' => 'btn bg-primary','style'=>'font-weight:bold; color:white;']);
                    }
                    return '';
                },
                'format' => 'raw',
            ],
            [
                'label' => 'Ko\'rsatma qo\'shish',
                'value' => function ($model) {
                    $company = Company::findOne(['control_instruction_id' => $model->id]);
                    if ($company) {
                        return Html::a('<i class="fa fa-plus" aria-hidden="true"></i>', ['/caution/prevention-create', 'id' => $model->id], ['class' => 'btn bg-success','style'=>'font-weight:bold; color:white;']);
                    }
                    return '';
                },
                'format' => 'raw',
            ],
        ],
    ]); ?>


</div>
