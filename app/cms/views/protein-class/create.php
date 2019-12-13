<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model cms\models\ProteinClass */

$this->title = 'Create Protein Class';
$this->params['breadcrumbs'][] = ['label' => 'Protein Classes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="protein-class-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
