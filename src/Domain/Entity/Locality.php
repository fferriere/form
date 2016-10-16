<?php

namespace Domain\Entity;

class Locality
{

    /**
     * @var string
     */
    private $id;

    /**
     * @var string
     */
    private $zip;

    /**
     * @var string
     */
    private $city;

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getZip()
    {
        return $this->zip;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $id
     * @return Locality
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @param string $zip
     * @return \Locality
     */
    public function setZip($zip)
    {
        $this->zip = $zip;
        return $this;
    }

    /**
     * @param type $city
     * @return Locality
     */
    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

}
