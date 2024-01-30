<?php

namespace common\models\caution;

use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "caution_instructions".
 *
 * @property int $id
 * @property int|null $base
 * @property int|null $letter_date
 * @property string|null $letter_number
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Company $cautionCompany
 */
class Instruction extends \yii\db\ActiveRecord
{
    const BASE_APPEAL = 1;
    const BASE_ASSIGNMENT = 2;
    const BASE_SMM_APPEAL = 3;

    public static function tableName()
    {
        return 'caution_instructions';
    }

    public function rules()
    {
        return [
            [['base'], 'integer'],
            [['letter_number', 'letter_date'], 'string', 'max' => 255],
        ];
    }

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->letter_date = Yii::$app->formatter->asTimestamp($this->letter_date);

        return true;
    }

    public function afterFind()
    {
        $this->letter_date = Yii::$app->formatter->asDate($this->letter_date, 'm/d/Y');
        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    public static function getType($type = null)
    {
        $arr = [
            self::BASE_APPEAL => 'Kelib tushgan murojaat',
            self::BASE_ASSIGNMENT => 'Xukumat topshiriqlari',
            self::BASE_SMM_APPEAL => 'Ijtimoiy tarmoqlardan kelib tushgan murojaatlar',
        ];

        if ($type === null) {
            return $arr;
        }

        return $arr[$type];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'base' => 'Asos',
            'letter_date' => 'Xujjat sanasi',
            'letter_number' => 'Xujjat nomeri',
            'created_by' => 'Created By',
            'updated_by' => 'Updated By',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
            BlameableBehavior::className(),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getCautionCompany()
    {
        return $this->hasOne(Company::className(), ['caution_instruction_id' => 'id']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}