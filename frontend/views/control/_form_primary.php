<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */

/* @var $model PrimaryData */

use common\models\control\PrimaryData;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\helpers\ArrayHelper;
use common\models\NdType;
use yii\widgets\ActiveForm;

//$this->title = 'Birlamchi ma`lumotlar';
//$this->params['breadcrumbs'][] = $this->title;

?>

<?php DynamicFormWidget::begin([
    'widgetContainer' => 'dynamicform_inner',
    'widgetBody' => '.container-rooms',
    'widgetItem' => '.room-item',
    'limit' => 4,
    'min' => 1,
    'insertButton' => '.add-room',
    'deleteButton' => '.remove-room',
    'model' => $pro_primary[0],
    'formId' => 'dynamic-form',
    'formFields' => [
        'name',
        'type_id',
    ],
]); ?>
    <table class="table table-bordered">
        <thead>
        </thead>
        <tbody class="container-rooms">
        <h5 style="color:black;">Mahsulotga oid texnik regalament yoki meyoriy hujjat(lar)</h5>
        <?php foreach ($pro_primary as $indexRoom => $modelRoom): ?>
            <tr class="room-item ">
                <td class="vcenter">
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($modelRoom, "[{$primaryIndex}][{$indexRoom}]type_id")->dropDownList(ArrayHelper::map(NdType::find()->all(), 'id', 'name')) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($modelRoom, "[{$primaryIndex}][{$indexRoom}]name")->textInput() ?>
                        </div>
                    </div>
                </td>
                <td class="text-center vcenter" style="width: 90px;">
                    <button type="button" class="add-room btn btn-success btn-xs">
                        <span class="fa fa-plus"></span>
                    </button>
                    <button type="button" class="remove-room btn btn-danger btn-xs mt-3 ">
                        <i class="fas fa-trash-alt"></i>
                    </button>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php DynamicFormWidget::end(); ?>