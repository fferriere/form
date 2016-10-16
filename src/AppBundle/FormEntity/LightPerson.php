<?php

namespace AppBundle\FormEntity;

class LightPerson {
    
    /**
     * @var string
     */
    private $lastName;
    
    /**
     * @var string
     */
    private $firstName;
    
    /**
     * @return string
     */
    public function getLastName() {
        return $this->lastName;
    }

    /**
     * @return string
     */
    public function getFirstName() {
        return $this->firstName;
    }

    /**
     * @param string $lastName
     * @return LightPerson
     */
    public function setLastName($lastName) {
        $this->lastName = $lastName;
        return $this;
    }

    /**
     * @param string $firstName
     * @return LightPerson
     */
    public function setFirstName($firstName) {
        $this->firstName = $firstName;
        return $this;
    }

}
