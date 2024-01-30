<?php

use common\models\control\Company;
use common\models\Region;
use frontend\widgets\Steps;
use yii\helpers\ArrayHelper;
use yii\web\View;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;


/* @var $this View */
/* @var $form ActiveForm */
/* @var $model Company */

$this->title = 'Korxona';
$this->params['breadcrumbs'][] = $this->title;
?>
<style>
 .help-block 
    {
        color:red !important;
    }
</style>
<div class="page1-1 row" style="margin:auto; padding:10px;">

    <?php $form = ActiveForm::begin() ?>


    <div class="row">
        <div class="col-sm-6">
            <label class="control-label" for="company-name">Xo'jalik yurutuvchi subyekt nomi (XYUS)</label>
            <?= $form->field($model, 'name')->textInput()->label(false) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'inn')->widget(MaskedInput::className(), [
                'mask' => '999999999'
            ]) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'region_id')->dropDownList(ArrayHelper::map(Region::find()->all(), 'id', 'name')) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'soogu')->widget(MaskedInput::className(), [
                'mask' => '99999']) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'ifut')->widget(MaskedInput::className(), [
                'mask' => '99999']) ?>
        </div>
  
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'thsht')->widget(MaskedInput::className(), [
                'mask' => '999']) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'type')->textInput() ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'phone')->widget(MaskedInput::className(), [
                'mask' => '(99)-999-99-99'
            ]) ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'address')->textInput() ?>
        </div>
        <div class="col-md-6 col-sm-12">
            <?= $form->field($model, 'ownername')->textInput();?>
        </div>
    </div>

    <div class="col-12">
        <input type="submit" class="btn btn-info br-btn" value="Saqlash">
    </div>

    <?php ActiveForm::end() ?>
    <!--
        <div class=" col-12 mt-3">
            <button type="button" class="btn btn-secondary" id="location-button">Get geolocation</button>
            <iframe src="https://www.google.com/maps/embed/v1/place?key=AIzaSyA0s1a7phLN0iaD6-UE7m4qP-z21pH0eSc&q=Eiffel+Tower+Paris+France" frameborder="0" style="border:0; width: 100%; height: 30vh;" allowfullscreen>
            </iframe>
        </div>-->

</div>
<script src="/js/jquery.js"></script>
<script>

    let geoBtn = document.getElementById("location-button")

    geoBtn.addEventListener("click", function () {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function (position) {
                console.log(position)
                $.get("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + position.coords.latitude + ',' + position.coords.longitude + "&sensor=false", function (data) {
                    console.log(data)
                })
            })
        } else {
            console.log('geolocation is not supported')
        }
    })

</script>