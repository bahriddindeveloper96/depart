<?php 
use yii\helpers\Html;
use yii\helpers\Url;?>

<div class="container list-group margin-topSite">
    <div class="border border-1 rounded">
        <ul class="list-group">
        <li class="list-group-item disabled" aria-disabled="true">Reestr</li>
        <a href="#" class="list-group-item list-group-item-action">Davlat nazorat buyruqlari</a>
        <a href="<?= Url::to(['/caution/letters']) ?>" class="list-group-item list-group-item-action">Ogohlantirish xatlari</a>
        <div class="dropdown">
            <a href="#" class="list-group-item list-group-item-action btn-block dropdown-toggle active" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Ko'rsatmalar</a>
                <div class="dropdown-menu">
                <a class="dropdown-item active" href="<?= Url::to(['/caution/prevention']) ?>">Bartaraf etish ko'rsatmasi</a>
                <a class="dropdown-item" href="<?= Url::to(['/caution/embargo']) ?>">Taqiqlash ko'rsatmasi</a>
               
            </div>
        </div>
        <a href="#" class="list-group-item list-group-item-action">Javob xatlari</a>
        
        <div class="dropdown">
            <a href="#" class="list-group-item list-group-item-action btn-block dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">Choralar</a>
                <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= Url::to(['/measure/ov-index']) ?>">O'lchov vositasini taqiqlash</a>
                <a class="dropdown-item" href="<?= Url::to(['/measure/realization-index']) ?>">Realizatsiyani taqiqlash</a>
                <a class="dropdown-item" href="<?= Url::to(['/measure/economic-index']) ?>">Iqtisodiy jarima</a>
                <a class="dropdown-item" href="<?= Url::to(['/measure/execution-index']) ?>">Ma'muriy bayonnoma</a>
            </div>
        </div>
        </ul>
    </div>
</div>