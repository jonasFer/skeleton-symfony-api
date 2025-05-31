<?php

namespace App\Domain\Model;

use Doctrine\ORM\Mapping as ORM;

trait CommomFields
{
    #[ORM\Column(name: 'created_at', type: 'datetime', options: ['default' => 'CURRENT_TIMESTAMP'])]
    protected \DateTime $created;
    #[ORM\Column(name: 'updated_at', type: 'datetime')]
    protected ?\DateTime $updated;

    public function __construct()
    {
        $this->created = new \DateTime();
    }

    public function getCreated(): \DateTime
    {
        return $this->created;
    }

    public function setCreated(\DateTime $created): void
    {
        $this->created = $created;
    }

    public function getUpdated(): ?\DateTime
    {
        return $this->updated;
    }

    public function setUpdated(?\DateTime $updated): void
    {
        $this->updated = $updated;
    }
}
