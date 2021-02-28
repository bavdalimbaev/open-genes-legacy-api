<?php

namespace genes\models;

use Yii;

/**
 * This is the model class for table "vital_process".
 *
 * @property int $id
 * @property string $name_ru
 * @property string $name_en
 * @property int $created_at
 * @property int $updated_at
 *
 * @property GeneInterventionToVitalProcess[] $geneInterventionToVitalProcesses
 */
class VitalProcess extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'vital_process';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'integer'],
            [['name_ru', 'name_en'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name_ru' => 'Name Ru',
            'name_en' => 'Name En',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGeneInterventionToVitalProcesses()
    {
        return $this->hasMany(GeneInterventionToVitalProcess::className(), ['vital_process_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return VitalProcessQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new VitalProcessQuery(get_called_class());
    }
}
