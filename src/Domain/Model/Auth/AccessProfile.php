<?php

namespace App\Domain\Model\Auth;

use App\Domain\Model\CommomFields;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity]
#[ORM\Table(name: 'access_profile', schema: 'auth')]
class AccessProfile
{
    use CommomFields;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(type: 'string', length: 255)]
    private string $name;
    #[ORM\JoinTable(name: 'access_profile_funcionality', schema: 'auth')]
    #[ORM\JoinColumn(name: 'access_profile_id', referencedColumnName: 'id')]
    #[ORM\InverseJoinColumn(name: 'funcionality_id', referencedColumnName: 'id')]
    #[ORM\ManyToMany(targetEntity: Funcionality::class)]
    private Collection $funcionalities;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getFuncionalities(): Collection
    {
        return $this->funcionalities;
    }

    public function setFuncionalities(Collection $funcionalities): void
    {
        $this->funcionalities = $funcionalities;
    }
}
