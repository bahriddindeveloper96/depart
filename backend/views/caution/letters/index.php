<?php

use common\models\caution\CautionLetters;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\bootstrap4\Breadcrumbs;

/** @var yii\web\View $this */
/** @var common\models\caution\CautionLettersSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Yii::t('app', 'Ogohlantirish xati');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="caution-letters-index">
    
    <?php echo Breadcrumbs::widget([
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                'options' => [
                    'class' => 'breadcrumb float-sm-right text-primary'
                ]
            ]);
            ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                       // ['class' => 'yii\grid\SerialColumn'],

                        [
                            'attribute'=> 'id',
                            'value' => function ($data) {
                                //$prevention = Prevention::findOne(['id' => $model->id]);
    
                                return $data ? $data->id : '';
                            }
                        ],
                        [
                            'attribute'=> 'company_id',
                            'value' => function ($data) {
                                //$prevention = Prevention::findOne(['id' => $model->id]);
    
                                return $data ? $data->company->name : '';
                            }
                        ],
                        'letter_date',
                        'letter_number',
                        [
                            'attribute'=> 'created_by',
                            'value'=> function($data){                               
                                return $data ? $data->user->name .' '.$data->user->surname :'';
                            }
                        ],
                        //'inpector_name',
                        [
                            'class' => ActionColumn::className(),
                            'template' => '{view}',
                            'buttonOptions' => [
                                'class' => 'text-primary'
                            ],
                            'urlCreator' => function ($action, $model, $key, $index) {
                                if ($action === 'view') {
                                    $url = Url::to(['caution/letters/view', 'id' => $model->id]);
                                    return $url;
                                }
                               
                            }
                        ],
                    ],
                ]); ?>

</div>
