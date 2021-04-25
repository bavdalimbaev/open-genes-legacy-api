<?php

namespace app\models;

use yii\db\Expression;

/**
 * This is the ActiveQuery class for [[Gene]].
 *
 * @see Gene
 */
class GeneQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return Gene[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Gene|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }


    public function withFunctionalClusters($lang)
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        return $this
            ->addSelect([
                'group_concat(distinct concat(functional_cluster.id,\'|\',functional_cluster.'. $nameField . ')) as functional_clusters'
            ])
            ->join(
                'LEFT JOIN',
                'gene_to_functional_cluster',
                'gene_to_functional_cluster.gene_id = gene.id'
            )
            ->join(
                'LEFT JOIN',
                'functional_cluster',
                'gene_to_functional_cluster.functional_cluster_id = functional_cluster.id'
            );
    }
    
    public function withDiseases($lang)
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        return $this
            ->addSelect([
                'group_concat(distinct concat(disease.id,\'|\',disease.omim_id,\'|\',(IF(disease.'. $nameField . ' IS NULL or disease.'. $nameField . ' = "", disease.name_en, disease.'. $nameField . ')))  separator "||") as diseases'
            ])
            ->join(
                'LEFT JOIN',
                'gene_to_disease',
                'gene_to_disease.gene_id = gene.id'
            )
            ->join(
                'LEFT JOIN',
                'disease',
                'gene_to_disease.disease_id = disease.id'
            );
    }

    public function withExpression()
    {
        return $this
            ->join(
                'LEFT JOIN',
                'gene_expression_in_sample',
                'gene_expression_in_sample.gene_id = gene.id'
            )
            ->join(
                'LEFT JOIN',
                'sample',
                'gene_expression_in_sample.sample_id = sample.id'
            );
    }

    public function withCommentCause($lang)
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        return $this
            ->addSelect([
                'group_concat(distinct concat(comment_cause.id,\'|\',comment_cause.'. $nameField . ')) as comment_cause'
            ])
            ->join(
                'LEFT JOIN',
                'gene_to_comment_cause',
                'gene_to_comment_cause.gene_id = gene.id'
            )
            ->join(
                'LEFT JOIN',
                'comment_cause',
                'gene_to_comment_cause.comment_cause_id = comment_cause.id'
            );
    }

    public function withProteinClasses($lang)
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        return $this
            ->addSelect([
                'group_concat(distinct protein_class.'. $nameField . ' separator \'||\') as protein_class'
            ])
            ->join(
                'LEFT JOIN',
                'gene_to_protein_class',
                'gene_to_protein_class.gene_id = gene.id'
            )
            ->join(
                'LEFT JOIN',
                'protein_class',
                'gene_to_protein_class.protein_class_id = protein_class.id'
            );
    }

    public function withAge()
    {
        return $this
            ->addSelect('age.name_mya as phylum_age, age.name_phylo as phylum_name, age.order as phylum_order, age.id as phylum_id')
            ->addSelect('taxon.name_en as taxon_name')
            ->join(
                'LEFT JOIN',
                'age',
                'gene.age_id = age.id'
            )
            ->join(
                'LEFT JOIN',
                'taxon',
                'gene.taxon_id = taxon.id'
            );
    }
    
    public function withGoTerms($lang)
    {
        $nameField = $lang == 'en-US' ? 'name_en' : 'name_ru';
        return $this
            ->addSelect(new Expression("
                group_concat(distinct concat(`gene_ontology`.`ontology_identifier`,'|',`gene_ontology`.`name_en`,'|',`gene_ontology`.`category`) separator  '||') as `go_terms`"))
            ->innerJoin('gene_to_ontology', 'gene_to_ontology.gene_id=gene.id')
            ->innerJoin('gene_ontology', 'gene_ontology.id = gene_to_ontology.gene_ontology_id');
    }
}
