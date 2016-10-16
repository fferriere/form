<?php

namespace Infrastructure;

use Symfony\Component\HttpFoundation\Session\Session;
use Domain\LocalityRepositoryInterface;
use Domain\Entity\Locality;
use Ramsey\Uuid\Uuid;

class LocalityRepository implements LocalityRepositoryInterface
{

    const KEY_LOCALITIES = 'localities';

    /**
     * @var SessionInterface
     */
    private $session;

    public function __construct()
    {
        $this->session = new Session();
    }

    /**
     * @param Locality $locality
     */
    public function deleteLocality(Locality $locality)
    {
        if (!$this->session->has(static::KEY_LOCALITIES)) {
            return;
        }

        $localities = $this->session->get(static::KEY_LOCALITIES);

        $id = $locality->getId();
        if (isset($localities[$id])) {
            unset($localities[$id]);
            $this->session->set(static::KEY_LOCALITIES, $localities);
        }
    }

    /**
     * @return Locality[]
     */
    public function findAll()
    {
        if (!$this->session->has(static::KEY_LOCALITIES)) {
            return;
        }

        return $this->session->get(static::KEY_LOCALITIES);
    }

    /**
     *
     * @param string $id
     * @return Locality
     */
    public function getById($id)
    {
        if (!$this->session->has(static::KEY_LOCALITIES)) {
            return;
        }

        $localities = $this->session->get(static::KEY_LOCALITIES);

        if (isset($localities[$id])) {
            return $localities[$id];
        }
        return null;
    }

    /**
     * @param Locality $locality
     */
    public function saveLocality(Locality $locality)
    {
        if (!$this->session->has('')) {
            return;
        }

        $localities = $this->session->get(static::KEY_LOCALITIES);

        $id = $locality->getId();
        if (!$id) {
            $id = Uuid::uuid4();
            $locality->setId($id);
        }

        $localities[$id] = $locality;
        dump($localities);
        $this->session->set(static::KEY_LOCALITIES, $localities);
    }

}
