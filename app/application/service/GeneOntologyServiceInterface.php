<?php

namespace application\service;

interface GeneOntologyServiceInterface
{
    public function mineFromGateway();

    public function mineFromGatewayForGene($id);

    public function getAllWithGenes();

    public function getForGene($id);
}