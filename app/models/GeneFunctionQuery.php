<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[GeneFunction]].
 *
 * @see GeneFunction
 */
class GeneFunctionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return GeneFunction[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return GeneFunction|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
