<?php

namespace Domain;

use Domain\Entity\Locality;

interface LocalityRepositoryInterface
{

    /**
     * @param Locality $locality
     */
    public function saveLocality(Locality $locality);

    /**
     * @param Locality $locality
     */
    public function deleteLocality(Locality $locality);

    /**
     * @param string $id
     * @return Locality
     */
    public function getById($id);

    /**
     * @return Locality[]
     */
    public function findAll();

}
