<?php

namespace App\Domain\Model\Auth;

use App\Domain\Model\CommomFields;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity]
#[ORM\Table(name: 'user', schema: 'auth')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    use CommomFields;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private int $id;
    #[ORM\Column(name: 'email', type: 'string', length: 180, unique: true)]
    private string $username;
    #[ORM\Column(type: 'string')]
    private string $password;
    #[ORM\ManyToOne(targetEntity: AccessProfile::class)]
    #[ORM\JoinColumn(name: 'access_profile_id', referencedColumnName: 'id',nullable: false)]
    private AccessProfile $accessProfile;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getUsername(): ?string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
    }

    public function getRoles(): array
    {
        $roles = [];

        foreach ($this->getAccessProfile()->getFuncionalities() as $role) {
            $roles[] = $role->getRole();
        }

        return array_unique($roles);
    }

    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getAccessProfile(): AccessProfile
    {
        return $this->accessProfile;
    }

    public function setAccessProfile(AccessProfile $accessProfile): void
    {
        $this->accessProfile = $accessProfile;
    }

    public function getUserIdentifier(): string
    {
        return $this->username;
    }

    public function eraseCredentials(): void
    {
        return;
    }
}