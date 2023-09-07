<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CategoryRepository::class)]
class Category
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\OneToMany(mappedBy: 'Category', targetEntity: Authority::class)]
    private Collection $authorities;

    public function __construct()
    {
        $this->authorities = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return Collection<int, Authority>
     */
    public function getAuthorities(): Collection
    {
        return $this->authorities;
    }

    public function addAuthority(Authority $authority): self
    {
        if (!$this->authorities->contains($authority)) {
            $this->authorities->add($authority);
            $authority->setCategory($this);
        }

        return $this;
    }

    public function removeAuthority(Authority $authority): self
    {
        if ($this->authorities->removeElement($authority)) {
            // set the owning side to null (unless already changed)
            if ($authority->getCategory() === $this) {
                $authority->setCategory(null);
            }
        }

        return $this;
    }
}
