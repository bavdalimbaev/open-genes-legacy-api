<?php
namespace genes\application\dto;

class GeneFullViewDto
{
    /** @var int */
    public $id;
    /** @var PhylumDto */
    public $origin;
    /** @var string */
    public $symbol;
    /** @var array */
    public $aliases;
    /** @var string */
    public $name;
    /** @var string */
    public $entrezGene;
    /** @var string */
    public $uniprot;
    /** @var string */
    public $commentEvolution;
    /** @var string */
    public $commentFunction;
    /** @var array */
    public $commentCause;
    /** @var string */
    public $commentAging;
    /** @var array */
    public $commentsReferenceLinks;
    /** @var string */
    public $rating;
    /** @var FunctionalClusterDto[] */
    public $functionalClusters;
    /** @var array [$geneName => $geneExpression[]] */
    public $expression;
    /** @var array */
    public $functions;
    /** @var array */
    public $proteinClasses;
    /** @var string */
    public $expressionChange;
    /** @var string */
    public $band;
    /** @var int */
    public $locationStart;
    /** @var int */
    public $locationEnd;
    /** @var int */
    public $orientation;
    /** @var string */
    public $accPromoter;
    /** @var string */
    public $accOrf;
    /** @var string */
    public $accCds;
//    /** @var array */
//    public $references;
    /** @var array */
    public $orthologs;
    /** @var array */
    public $why;

//    public $isHidden;
//    public $dateAdded;
//    public $userEdited;
//    public $hylo;
}

