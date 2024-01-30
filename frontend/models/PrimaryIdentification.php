<?php

namespace frontend\models;

use common\models\control\ProductType;
use common\models\ProgramType;
use Yii;
use yii\base\Model;
use common\models\Countries;
use yii\helpers\VarDumper;

class PrimaryIdentification extends Model
{

    public $id;
    public $product_id;
    public $labaratory_checking;
    public $quality;
    public $description;
    public $product_name;
    public $name;
    public $breaking_certification;
    public $quantity;
    public $amount;
    public $certification;
    public $defect_type;

    public function rules()
    {
        return [
            [[ 'quality',], 'required'],
            [['id', 'product_id','labaratory_checking','quality','breaking_certification'], 'integer'],
            [['description', 'name','product_name','amount','quantity' ], 'string'],
            [['defect_type'], 'safe']
            
        ];
    }

   

    public function attributeLabels()
    {
        return [

            'name' => 'Mahsulot nome',
            'quality' => 'Mahsulotning yaroqliligi',
            'description' => 'Izoh',
            'labaratory_description' => 'Izoh',
            'number_reestr' => 'Sertifikat raqami',
            'date_to' => 'Berilgan sanasi',
            'date_from' => 'Amal qilish mudati',
            'amount' => 'Sertifikatsiz realizatsiya qilingan mahsulot summasi',
            'quantity' => 'Sertifikatsiz realizatsiya qilingan mahsulot miqdori',
            'breaking_certification' => 'Sertifikatlashtirish talabi buzilgan',
            'defect_type' => 'Nomuvofiqlik sababi',
          
        ];
    }
   
  
    /**
     * @param int $parent_id
     * @return array
     */
    public static function getCity(int $parent_id): array
    {
        return ProductType::find()
            ->where(['id' => $parent_id])
            ->select(['id', 'name AS name'])
            ->asArray()
            ->all();
    }


}
