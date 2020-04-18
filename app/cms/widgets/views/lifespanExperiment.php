<?php
/** @var $lifespanExperiment \cms\models\LifespanExperiment */
?>
<div class="form-split protein-activity js-lifespan-experiment js-gene-link-section">
    <div class="js-lifespan-experiment-block js-gene-link-block">
        <div class="form-split">
            <div class="form-third">
                <?= \kartik\select2\Select2::widget([
                    'model' => $lifespanExperiment,
                    'attribute' => '[' . $lifespanExperiment->id . ']gene_intervention_id',
                    'data' => \cms\models\GeneIntervention::getAllNamesAsArray(),
                    'options' => [
                        'placeholder' => 'Вмешательство',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => false,
                        'tags' => true,
                        'tokenSeparators' => ['##'],
                    ],
                ]);
                ?>
            </div>
            <div class="form-third">
                <?= \kartik\select2\Select2::widget([
                    'model' => $lifespanExperiment,
                    'attribute' => '[' . $lifespanExperiment->id . ']intervention_result_id',
                    'data' => \cms\models\InterventionResultForLongevity::getAllNamesAsArray(),
                    'options' => [
                        'placeholder' => 'Результат вмешательства',
                        'multiple' => false,
                    ],
                    'pluginOptions' => [
                        'allowClear' => false,
                        'tags' => true,
                        'tokenSeparators' => ['##'],
                    ],
                ]);
                ?>
            </div>
            <div class="form-third">
                <?= \kartik\select2\Select2::widget([
                    'model' => $lifespanExperiment,
                    'attribute' => '[' . $lifespanExperiment->id . ']model_organism_id',
                    'data' => \cms\models\ModelOrganism::getAllNamesAsArray(),
                    'options' => [
                        'placeholder' => 'Организм',
                        'multiple' => false
                    ],
                    'pluginOptions' => [
                        'allowClear' => false,
                        'tags' => true,
                        'tokenSeparators' => ['##'],
                    ],
                ]);
                ?>
            </div>
        </div>
        <div class="form-split">
            <div class="form-half-without-margin">
                <div class="form-half-without-margin">
                    <div class="form-half-without-margin">
                        <?= \yii\bootstrap\Html::activeInput('text', $lifespanExperiment, '[' . $lifespanExperiment->id . ']age', ['class' => 'form-control', 'placeholder' => 'Возраст']) ?>
                    </div>
                    <div class="form-half-without-margin">
                        <?= \kartik\select2\Select2::widget([
                            'model' => $lifespanExperiment,
                            'attribute' => '[' . $lifespanExperiment->id . ']age_unit',
                            'data' => [1 => 'дней', 2 => 'месяцев', 3 => 'лет'],
                            'options' => [
                                'placeholder' => 'Ед. изм. возраста',
                                'multiple' => false
                            ],
                            'pluginOptions' => [
                                'allowClear' => true,
                            ],
                        ]);
                        ?>
                    </div>
                </div>
                <div class="form-half-without-margin">
                    <?= \kartik\select2\Select2::widget([
                        'model' => $lifespanExperiment,
                        'attribute' => '[' . $lifespanExperiment->id . ']organism_line_id',
                        'data' => \cms\models\OrganismLine::getAllNamesAsArray(),
                        'options' => [
                            'placeholder' => 'Линия организма',
                            'multiple' => false,
                        ],
                        'pluginOptions' => [
                            'allowClear' => true,
                            'tags' => true,
                            'tokenSeparators' => ['##'],
                        ],
                    ]);
                    ?>
                </div>
            </div>
            <div class="form-half-without-margin">
                <div class="form-third">
                    <?= \yii\bootstrap\Html::activeInput('text', $lifespanExperiment, '[' . $lifespanExperiment->id . ']lifespan_change_percent_male', ['class' => 'form-control', 'placeholder' => 'Изменение (%) муж']) ?>
                </div>
                <div class="form-third">
                    <?= \yii\bootstrap\Html::activeInput('text', $lifespanExperiment, '[' . $lifespanExperiment->id . ']lifespan_change_percent_female', ['class' => 'form-control', 'placeholder' => 'Изменение (%) жен']) ?>
                </div>
                <div class="form-third">
                    <?= \yii\bootstrap\Html::activeInput('text', $lifespanExperiment, '[' . $lifespanExperiment->id . ']lifespan_change_percent_common', ['class' => 'form-control', 'placeholder' => 'Изменение (%) общее']) ?>
                </div>
            </div>
        </div>
        <div class="form-split">
            <?= \yii\bootstrap\Html::activeInput('text', $lifespanExperiment, '[' . $lifespanExperiment->id . ']reference', ['class' => 'form-control', 'placeholder' => 'Ссылка']) ?>
        </div>
        <div class="form-split no-margin">
            <div class="form-half-small-margin">
                <?= \yii\bootstrap\Html::activeTextarea($lifespanExperiment, '[' . $lifespanExperiment->id . ']comment_ru', ['class' => 'form-control', 'placeholder' => 'Дополнительная информация']) ?>
            </div>
            <div class="form-half-small-margin">
                <?= \yii\bootstrap\Html::activeTextarea($lifespanExperiment, '[' . $lifespanExperiment->id . ']comment_en', ['class' => 'form-control', 'placeholder' => 'Дополнительная информация EN']) ?>
            </div>
        </div>
    </div>
    <div class="delete-protein"><?= \yii\bootstrap\Html::activeCheckbox($lifespanExperiment, '[' . $lifespanExperiment->id . ']delete', ['class' => 'js-delete']) ?></div>
</div>