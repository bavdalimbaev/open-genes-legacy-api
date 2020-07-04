<?php
/** @var $proteinToGene \cms\models\ProteinToGene */
?>
<div class="form-split protein-activity yellow js-protein-to-gene js-gene-link-section">
    <div class="js-protein-to-gene-block js-gene-link-block">
        <div class="form-split">
                <div class="form-half-small-margin">
                    <?= \kartik\select2\Select2::widget([
                        'model' => $proteinToGene,
                        'attribute' => '[' . $proteinToGene->id . ']protein_activity_id',
                        'data' => \cms\models\ProteinActivity::getAllNamesAsArray(),
                        'options' => [
                            'placeholder' => 'Активность',
                            'multiple' => false
                        ],
                        'pluginOptions' => [
                            'allowClear' => false,
                            'tags' => true,
                            'tokenSeparators' => ['##'],
                            'containerCssClass' => 'yellow',
                            'dropdownCssClass' => 'yellow',
                        ],
                    ]);
                    ?>
                </div>
                <div class="form-half-small-margin">
                    <?= \kartik\select2\Select2::widget([
                        'model' => $proteinToGene,
                        'attribute' => '[' . $proteinToGene->id . ']regulated_gene_id',
                        'data' => \cms\models\Gene::getAllNamesAsArray(),
                        'options' => [
                            'placeholder' => 'Ген',
                            'multiple' => false,
                        ],
                        'pluginOptions' => [
                            'allowClear' => false,
                            'tokenSeparators' => ['##'],
                            'containerCssClass' => 'yellow',
                            'dropdownCssClass' => 'yellow',
                        ],
                    ]);
                    ?>
                </div>
        </div>
        <div class="form-split">
            <div class="form-half-small-margin">
                <?= \kartik\select2\Select2::widget([
                    'model' => $proteinToGene,
                    'attribute' => '[' . $proteinToGene->id . ']regulation_type',
                    'data' => ['' => '', 1 => 'экспрессия гена', 2 => 'активность белка'],
                    'options' => [
                        'placeholder' => 'Вид регуляции',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => true,
                        'containerCssClass' => 'yellow',
                        'dropdownCssClass' => 'yellow',
                    ],
                ]);
                ?>
            </div>
            <div class="form-half-small-margin">
                <?= \yii\bootstrap\Html::activeInput('text', $proteinToGene, '[' . $proteinToGene->id . ']reference', ['class' => 'form-control', 'placeholder' => 'Ссылка']) ?>
            </div>
        </div>
        <div class="form-split no-margin">
            <div class="form-half-small-margin">
                <?= \yii\bootstrap\Html::activeTextarea($proteinToGene, '[' . $proteinToGene->id . ']comment_ru', ['class' => 'form-control', 'placeholder' => 'Дополнительная информация']) ?>
            </div>
            <div class="form-half-small-margin">
                <?= \yii\bootstrap\Html::activeTextarea($proteinToGene, '[' . $proteinToGene->id . ']comment_en', ['class' => 'form-control', 'placeholder' => 'Дополнительная информация EN']) ?>
            </div>
        </div>
    </div>
    <div class="delete-protein"><?= \yii\bootstrap\Html::activeCheckbox($proteinToGene, '[' . $proteinToGene->id . ']delete', ['class' => 'js-delete']) ?></div>
</div>