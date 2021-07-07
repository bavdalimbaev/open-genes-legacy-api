<?php
namespace app\infrastructure\dataProvider;

use app\models\AgeRelatedChange;
use app\models\GeneInterventionToVitalProcess;
use app\models\GeneToAdditionalEvidence;
use app\models\GeneToLongevityEffect;
use app\models\GeneToProgeria;
use app\models\LifespanExperiment;
use app\models\ProteinToGene;

class GeneResearchesDataProvider implements GeneResearchesDataProviderInterface
{

    //// lifespan-experiments
    //// age-related-changes
    //// intervention-to-vital-processes
    //// protein-to-genes
    //// gene-to-progerias
    //// gene-to-longevity-effects

    public function getLifespanExperimentsByGeneId(int $geneId, string $lang): array
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        $commentField = $lang == 'en-US' ? 'comment_en' : 'comment_ru';
        return LifespanExperiment::find()
            ->select([
                "gene_intervention.{$nameField} as interventionType",
                "intervention_result_for_longevity.{$nameField} as interventionResult",
                "model_organism.{$nameField} as modelOrganism",
                "organism_line.{$nameField} as organismLine",
                "lifespan_experiment.age",
                "lifespan_experiment.genotype",
                "lifespan_experiment.age_unit as ageUnit",
                "lifespan_experiment.lifespan_change_percent_male as valueForMale",
                "lifespan_experiment.lifespan_change_percent_female as valueForFemale",
                "lifespan_experiment.lifespan_change_percent_common as valueForAll",
                "lifespan_experiment.reference as doi",
                "lifespan_experiment.pmid",
                "lifespan_experiment.{$commentField} as comment",
            ])
            ->distinct()
            ->innerJoin('gene_intervention', 'lifespan_experiment.gene_intervention_id=gene_intervention.id')
            ->innerJoin('intervention_result_for_longevity', 'lifespan_experiment.intervention_result_id=intervention_result_for_longevity.id')
            ->leftJoin('model_organism', 'lifespan_experiment.model_organism_id=model_organism.id')
            ->leftJoin('organism_line', 'lifespan_experiment.organism_line_id=organism_line.id')
            ->where(['gene_id' => $geneId])
            ->asArray()
            ->all();
    }

    public function getAgeRelatedChangesByGeneId(int $geneId, string $lang): array
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        $commentField = $lang == 'en-US' ? 'comment_en' : 'comment_ru';
        return AgeRelatedChange::find()
            ->select([
                "age_related_change_type.{$nameField} as changeType",
                "sample.{$nameField} as sample",
                "model_organism.{$nameField} as modelOrganism",
                "organism_line.{$nameField} as organismLine",
                "age_related_change.age_from as ageFrom",
                "age_related_change.age_to as ageTo",
                "age_related_change.age_unit as ageUnit",
                "age_related_change.change_value_male as valueForMale",
                "age_related_change.change_value_female as valueForFemale",
                "age_related_change.change_value_common as valueForAll",
                "age_related_change.measurement_type as measurementType",
                "age_related_change.reference as doi",
                "age_related_change.pmid",
                "age_related_change.{$commentField} as comment",
            ])
            ->distinct()
            ->innerJoin('age_related_change_type', 'age_related_change.age_related_change_type_id=age_related_change_type.id')
            ->leftJoin('sample', 'age_related_change.sample_id=sample.id')
            ->leftJoin('model_organism', 'age_related_change.model_organism_id=model_organism.id')
            ->leftJoin('organism_line', 'age_related_change.organism_line_id=organism_line.id')
            ->where(['gene_id' => $geneId])
            ->asArray()
            ->all();
    }

    public function getGeneInterventionToVitalProcessByGeneId(int $geneId, string $lang): array
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        $commentField = $lang == 'en-US' ? 'comment_en' : 'comment_ru';
        return GeneInterventionToVitalProcess::find()
            ->select([
                "gene_intervention.{$nameField} as geneIntervention",
                "vital_process.{$nameField} as vitalProcess",
                "model_organism.{$nameField} as modelOrganism",
                "organism_line.{$nameField} as organismLine",
                "intervention_result_for_vital_process.{$nameField} as interventionResult",
                "gene_intervention_to_vital_process.age",
                "gene_intervention_to_vital_process.genotype",
                "gene_intervention_to_vital_process.age_unit as ageUnit",
                "gene_intervention_to_vital_process.sex_of_organism as sex",
                "gene_intervention_to_vital_process.reference as doi",
                "gene_intervention_to_vital_process.pmid",
                "gene_intervention_to_vital_process.{$commentField} as comment",
            ])
            ->distinct()
            ->innerJoin('gene_intervention', 'gene_intervention_to_vital_process.gene_intervention_id=gene_intervention.id')
            ->innerJoin('vital_process', 'gene_intervention_to_vital_process.vital_process_id=vital_process.id')
            ->leftJoin('model_organism', 'gene_intervention_to_vital_process.model_organism_id=model_organism.id')
            ->leftJoin('organism_line', 'gene_intervention_to_vital_process.organism_line_id=organism_line.id')
            ->leftJoin('intervention_result_for_vital_process', 'gene_intervention_to_vital_process.intervention_result_for_vital_process_id=intervention_result_for_vital_process.id')
            ->where(['gene_id' => $geneId])
            ->asArray()
            ->all();
    }

    public function getProteinToGenesByGeneId(int $geneId, string $lang): array
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        $commentField = $lang == 'en-US' ? 'comment_en' : 'comment_ru';
        return ProteinToGene::find()
            ->select([
                "regulated_gene.id as regulatedGeneId",
                "regulated_gene.symbol as regulatedGeneSymbol",
                "regulated_gene.name as regulatedGeneName",
                "regulated_gene.ncbi_id as regulatedGeneNcbiId",
                "protein_activity.{$nameField} as proteinActivity",
                "gene_regulation_type.{$nameField} as regulationType",
                "protein_to_gene.reference as doi",
                "protein_to_gene.pmid",
                "protein_to_gene.{$commentField} as comment",
            ])
            ->distinct()
            ->innerJoin('gene as regulated_gene', 'protein_to_gene.regulated_gene_id=regulated_gene.id')
            ->innerJoin('protein_activity', 'protein_to_gene.protein_activity_id=protein_activity.id')
            ->innerJoin('gene_regulation_type', 'protein_to_gene.regulation_type_id=gene_regulation_type.id')
            ->where(['gene_id' => $geneId])
            ->asArray()
            ->all();
    }

    public function getGeneToProgeriasByGeneId(int $geneId, string $lang): array
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        $commentField = $lang == 'en-US' ? 'comment_en' : 'comment_ru';
        return GeneToProgeria::find()
            ->select([
                "progeria_syndrome.{$nameField} as progeriaSyndrome",
                "gene_to_progeria.reference as doi",
                "gene_to_progeria.pmid",
                "gene_to_progeria.{$commentField} as comment",
            ])
            ->distinct()
            ->innerJoin('progeria_syndrome', 'gene_to_progeria.progeria_syndrome_id=progeria_syndrome.id')
            ->where(['gene_id' => $geneId])
            ->asArray()
            ->all();
    }

    public function getGeneToLongevityEffectsByGeneId(int $geneId, string $lang): array
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        $commentField = $lang == 'en-US' ? 'comment_en' : 'comment_ru';
        return GeneToLongevityEffect::find()
            ->select([
                "longevity_effect.{$nameField} as longevityEffect",
                "genotype.{$nameField} as allelicPolymorphism",
                "gene_to_longevity_effect.sex_of_organism as sex",
                "gene_to_longevity_effect.allele_variant as allelicVariant",
                "model_organism.{$nameField} as modelOrganism",
                "age_related_change_type.{$nameField} as changeType",
                "gene_to_longevity_effect.data_type as dataType",
                "gene_to_longevity_effect.reference as doi",
                "gene_to_longevity_effect.pmid",
                "gene_to_longevity_effect.{$commentField} as comment",
            ])
            ->distinct()
            ->innerJoin('longevity_effect', 'gene_to_longevity_effect.longevity_effect_id=longevity_effect.id')
            ->leftJoin('genotype', 'gene_to_longevity_effect.genotype_id=genotype.id')
            ->leftJoin('age_related_change_type', 'gene_to_longevity_effect.age_related_change_type_id=age_related_change_type.id')
            ->leftJoin('model_organism', 'gene_to_longevity_effect.model_organism_id=model_organism.id')
            ->where(['gene_id' => $geneId])
            ->asArray()
            ->all();
    }

    public function getGeneToAdditionalEvidencesByGeneId(int $geneId, string $lang): array
    {
        $commentField = $lang == 'en-US' ? 'comment_en' : 'comment_ru';
        return GeneToAdditionalEvidence::find()
            ->select([
                "gene_to_additional_evidence.reference as doi",
                "gene_to_additional_evidence.pmid",
                "gene_to_additional_evidence.{$commentField} as comment",
            ])
            ->distinct()
            ->where(['gene_id' => $geneId])
            ->asArray()
            ->all();
    }


}