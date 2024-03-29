<?php

namespace common\models\profilactic;

use common\models\ProgramType;
use common\models\User;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "instructions".
 *
 * @property int $id
 * @property int $base
 * @property int|null $letter_date
 * @property string|null $letter_number
 * @property string|null $fio
 * @property int $created_by
 * @property int $updated_by
 * @property int $created_at
 * @property int $updated_at
 *
 * @property User $createdBy
 * @property User $updatedBy
 * @property Company $company
 */
class Instruction extends ActiveRecord
{
    const GENERAL_STATUS_IN_PROCESS = 11;
    const GENERAL_STATUS_SEND = 20;
    const GENERAL_STATUS_DONE = 21;

    const BASE_GRAF = 0;
    const BASE_APPEAL = 1;
    const BASE_ASSIGNMENT = 2;
    const BASE_SMM_APPEAL = 3;

    const SUBJECT_PRODUCT = 0;
    const SUBJECT_POINT = 1;
    const SUBJECT_SERVICE = 2;
    
    const STATUS_ONLINE = 0;
    const STATUS_OFFLINE = 1;
    
    const PROGRAM_ENTERPRISES = 1;
    const PROGRAM_INVEST = 2;

    public static function tableName()
    {
        return 'pro_instructions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['base', 'subject', 'status'], 'required'],
            [['general_status'], 'default', 'value' => self::GENERAL_STATUS_IN_PROCESS],
            [['base', 'subject', 'status', 'program_type', 'general_status'], 'integer'],
            [['letter_number', 'letter_date', 'fio'], 'string', 'max' => 255],
            [['program_type'], 'exist', 'skipOnError' => true, 'targetClass' => ProgramType::className(), 'targetAttribute' => ['program_type' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'base' => 'Profilaktika nima asosida o\'tkazilmoqda',
            'subject' => 'Xususiy yuridik subyekti',
            'status' => 'Status',
            'program_type' => 'Qaysi dasturga kiritilgan yoki hukumat qarorlari bo\'yicha va boshqalar...',
            'letter_date' => 'Xujjat sanasi',
            'letter_number' => 'Xujjat nomeri',
            'fio' => 'Mutaxasis (F.I.SH)',
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

    public function beforeSave($insert)
    {
        if (!parent::beforeSave($insert)) {
            return false;
        }

        $this->letter_date = Yii::$app->formatter->asTimestamp($this->letter_date);

        return true;
    }

    public static function getGeneralStatus($status = null)
    {
        $arr = [
            self::GENERAL_STATUS_IN_PROCESS => 'Bajarilmoqda',
            self::GENERAL_STATUS_SEND => 'Nazoratchiga yuborildi',
            self::GENERAL_STATUS_DONE => 'Bajarildi',
        ];

        if ($status === null) {
            return $arr;
        }

        return $arr[$status];
    }

    public function afterFind()
    {
        $this->letter_date = Yii::$app->formatter->asDate($this->letter_date, 'M/dd/yyyy');
        parent::afterFind(); // TODO: Change the autogenerated stub
    }

    public static function getStatus($status = null)
    {
        $arr = [
            self::STATUS_ONLINE => 'Online',
            self::STATUS_OFFLINE => 'Offline',       
          ];

        if ($status === null) {
            return $arr;
        }

        return $arr[$status];
    }

    
    public static function getSubject($subject = null)
    {
        $arr = [
            self::SUBJECT_PRODUCT => 'Ishlab chiqarish',
            self::SUBJECT_POINT => 'Savdo nuqtasi',
            self::SUBJECT_SERVICE => 'Xizmat ko\'rsatish',            
          ];

        if ($subject === null) {
            return $arr;
        }

        return $arr[$subject];
    }
    public static function getType($type = null)
    {
        $arr = [
            self::BASE_GRAF => 'Reja jadvali',
            self::BASE_APPEAL => 'Kelib tushgan murojaat',
            self::BASE_ASSIGNMENT => 'Xukumat topshiriqlari',
            self::BASE_SMM_APPEAL => 'Ijtimoiy tarmoqlardan kelib tushgan murojaatlar',
        ];

        if ($type === null) {
            return $arr;
        }

        return $arr[$type];
    }
    public static function getProgramType ($program_type = null)
    {
        $arr = [
            self::PROGRAM_ENTERPRISES => 'Mahalliylashtirish dasturiga kiritlgan korxonalar',
            self::PROGRAM_INVEST => 'Investitsiya loyihasiga kiritilgan korxonalar',
          ];

        if ($program_type === null) {
            return $arr;
        }

        return $arr[$program_type];
    }

  

    public function getCompany()
    {
        return $this->hasOne(Company::className(), ['pro_instruction_id' => 'id']);
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    public function getUpdatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'updated_by']);
    }
}
