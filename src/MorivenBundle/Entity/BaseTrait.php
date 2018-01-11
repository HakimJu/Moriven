<?php

namespace MorivenBundle\Entity;
use Doctrine\ORM\Mapping as ORM;

/**
 * BaseTrait
 *
 * @ORM\MappedSuperclass
 */
trait BaseTrait
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer", nullable=false)
     */
    public $id;

    /**
     * @ORM\Column(name="created", type="datetime", nullable=true)
     */
    public $created;

    /**
     * @ORM\PrePersist
     *
     * {@inheritDoc}
     */
    public function setTimestamps()
    {
        $this->created = $this->updated = new \DateTime;
    }

    /**
     * @ORM\Column(name="updated", type="datetime", nullable=true)
     */
    public $updated;

    /**
     * @ORM\PreUpdate
     *
     * {@inheritDoc}
     */
    public function setUpdated()
    {
        $this->updated = new \DateTime;
    }
}