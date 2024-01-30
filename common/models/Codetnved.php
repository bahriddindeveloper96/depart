<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "codetnved".
 *
 * @property int $id
 * @property string $kod
 * @property string $name
 * @property int|null $import
 */
class Codetnved extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'codetnved';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kod', 'name'], 'required'],
            [['name'], 'string'],
            [['import'], 'integer'],
            [['kod'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kod' => 'Kod',
            'name' => 'Name',
            'import' => 'Import',
        ];
    }
}
