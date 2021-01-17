<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CategoryRepository::class)
 */
class Category
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\OneToMany(targetEntity=Article::class, mappedBy="category", cascade={"persist", "remove"})
     */
    private $articles;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="subCategories")
     */
    private $parent;

    /**
     * @ORM\OneToMany(targetEntity=Category::class, mappedBy="parent")
     */
    private $subCategories;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $showAs = 'blog';

    /**
     * @ORM\Column(type="boolean")
     */
    private $showOnMenu = false;

    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->subCategories = new ArrayCollection();
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
     * @return Collection|Article[]
     */
    public function getArticles(): Collection
    {
        return $this->articles;
    }

    public function addArticle(Article $article): self
    {
        if (!$this->articles->contains($article)) {
            $this->articles[] = $article;
            $article->setCategory($this);
        }

        return $this;
    }

    public function removeArticle(Article $article): self
    {
        if ($this->articles->removeElement($article)) {
            // set the owning side to null (unless already changed)
            if ($article->getCategory() === $this) {
                $article->setCategory(null);
            }
        }

        return $this;
    }

    public function getFullName():string
    {
        $fullName = $this->getName();
        if ($this->parent instanceof Category) {
            $fullName = $this->parent->getFullName() . ' > ' . $fullName;
        }
        return $fullName;
    }

    public function __toString():string
    {
        return $this->getFullName();
    }

    public function getParent(): ?self
    {
        return $this->parent;
    }

    public function setParent(?self $parent): self
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * @return Collection|self[]
     */
    public function getSubCategories(): Collection
    {
        return $this->subCategories;
    }

    public function addSubCategory(self $subCategory): self
    {
        if (!$this->subCategories->contains($subCategory)) {
            $this->subCategories[] = $subCategory;
            $subCategory->setParent($this);
        }

        return $this;
    }

    public function removeSubCategory(self $subCategory): self
    {
        if ($this->subCategories->removeElement($subCategory)) {
            // set the owning side to null (unless already changed)
            if ($subCategory->getParent() === $this) {
                $subCategory->setParent(null);
            }
        }

        return $this;
    }

    public function getShowAs(): ?string
    {
        return $this->showAs;
    }

    public function setShowAs(?string $showAs): self
    {
        $this->showAs = $showAs;

        return $this;
    }

    public function getShowOnMenu(): bool
    {
        return $this->showOnMenu;
    }

    public function setShowOnMenu(bool $showOnMenu): self
    {
        $this->showOnMenu = $showOnMenu;

        return $this;
    }
}
