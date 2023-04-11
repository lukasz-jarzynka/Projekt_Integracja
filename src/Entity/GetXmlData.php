<?php

namespace App\Entity;

use App\Repository\GetXmlDataRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GetXmlDataRepository::class)]
class GetXmlData
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $url = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE, nullable: true)]
    private ?\DateTimeInterface $ts_last_download = null;

    #[ORM\OneToMany(mappedBy: 'getXmlData', targetEntity: XmlDataResult::class)]
    private Collection $XmlData;

    public function __construct()
    {
        $this->XmlData = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUrl(): ?string
    {
        return $this->url;
    }

    public function setUrl(?string $url): self
    {
        $this->url = $url;

        return $this;
    }

    public function getTsLastDownload(): ?\DateTimeInterface
    {
        return $this->ts_last_download;
    }

    public function setTsLastDownload(?\DateTimeInterface $ts_last_download): self
    {
        $this->ts_last_download = $ts_last_download;

        return $this;
    }

    /**
     * @return Collection<int, XmlDataResult>
     */
    public function getXmlData(): Collection
    {
        return $this->XmlData;
    }

    public function addXmlData(XmlDataResult $xmlData): self
    {
        if (!$this->XmlData->contains($xmlData)) {
            $this->XmlData->add($xmlData);
            $xmlData->setGetXmlData($this);
        }

        return $this;
    }

    public function removeXmlData(XmlDataResult $xmlData): self
    {
        if ($this->XmlData->removeElement($xmlData)) {
            // set the owning side to null (unless already changed)
            if ($xmlData->getGetXmlData() === $this) {
                $xmlData->setGetXmlData(null);
            }
        }

        return $this;
    }
}
