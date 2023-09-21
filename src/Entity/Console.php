<?php


namespace App\Entity;

use App\Repository\ConsoleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ConsoleRepository::class)]
class Console
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $brand = null;

    #[ORM\Column(type: Types::DATE_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $released = null;

    #[ORM\OneToMany(mappedBy: 'console', targetEntity: JeuxVideos::class)]
    private Collection $jeuxVideos;

    public function __toString()
    {
        return $this->name;
    }

    public function __construct()
    {
        $this->jeuxVideos = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getBrand(): ?string
    {
        return $this->brand;
    }

    public function setBrand(string $brand): static
    {
        $this->brand = $brand;

        return $this;
    }

    public function getReleased(): ?\DateTimeInterface
    {
        return $this->released;
    }

    public function setReleased(?\DateTimeInterface $released): static
    {
        $this->released = $released;

        return $this;
    }

    /**
     * @return Collection<int, JeuxVideos>
     */
    public function getJeuxVideos(): Collection
    {
        return $this->jeuxVideos;
    }

    public function addJeuxVideo(JeuxVideos $jeuxVideo): static
    {
        if (!$this->jeuxVideos->contains($jeuxVideo)) {
            $this->jeuxVideos->add($jeuxVideo);
            $jeuxVideo->setConsole($this);
        }

        return $this;
    }

    public function removeJeuxVideo(JeuxVideos $jeuxVideo): static
    {
        if ($this->jeuxVideos->removeElement($jeuxVideo)) {
            // set the owning side to null (unless already changed)
            if ($jeuxVideo->getConsole() === $this) {
                $jeuxVideo->setConsole(null);
            }
        }

        return $this;
    }
}
