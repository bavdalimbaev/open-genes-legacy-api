<?php

namespace cms\models;

use cms\models\behaviors\ChangelogBehavior;
use cms\models\traits\RuEnActiveRecordTrait;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "age".
 *
 */
class Genotype extends \genes\models\Genotype
{
    use RuEnActiveRecordTrait;

    public $name;

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            ChangelogBehavior::class
        ];
    }

}
