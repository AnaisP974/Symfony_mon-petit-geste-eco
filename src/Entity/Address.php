<?php

namespace App\Entity;

use App\Repository\AddressRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AddressRepository::class)]
class Address
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titleAddress = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $additionalAddress = null;

    #[ORM\Column(length: 5)]
    private ?string $postalCode = null;

    #[ORM\Column(length: 255)]
    private ?string $city = null;

    #[ORM\Column(length: 3)]
    private ?string $country = null;

    #[ORM\Column(length: 255)]
    private ?string $typeAddress = null;

    #[ORM\ManyToMany(targetEntity: User::class, inversedBy: 'addresses')]
    private Collection $user;

    public function __construct()
    {
        $this->user = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->titleAddress;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitleAddress(): ?string
    {
        return $this->titleAddress;
    }

    public function setTitleAddress(?string $titleAddress): self
    {
        $this->titleAddress = $titleAddress;

        return $this;
    }

    public function getAdditionalAddress(): ?string
    {
        return $this->additionalAddress;
    }

    public function setAdditionalAddress(?string $additionalAddress): self
    {
        $this->additionalAddress = $additionalAddress;

        return $this;
    }

    public function getPostalCode(): ?string
    {
        return $this->postalCode;
    }

    public function setPostalCode(string $postalCode): self
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    public function getCity(): ?string
    {
        return $this->city;
    }

    public function setCity(string $city): self
    {
        $this->city = $city;

        return $this;
    }

    public function getCountry(): ?string
    {
        return $this->country;
    }

    public function setCountry(string $country): self
    {
        $this->country = $country;

        return $this;
    }

    public function getTypeAddress(): ?string
    {
        return $this->typeAddress;
    }

    public function setTypeAddress(string $typeAddress): self
    {
        $this->typeAddress = $typeAddress;

        return $this;
    }

    /**
     * @return Collection<int, User>
     */
    public function getUser(): Collection
    {
        return $this->user;
    }

    public function addUser(User $user): self
    {
        if (!$this->user->contains($user)) {
            $this->user->add($user);
        }

        return $this;
    }

    public function removeUser(User $user): self
    {
        $this->user->removeElement($user);

        return $this;
    }
}
