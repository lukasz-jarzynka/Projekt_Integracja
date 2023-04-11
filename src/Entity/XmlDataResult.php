<?php

namespace App\Entity;

use App\Repository\XmlDataResultRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: XmlDataResultRepository::class)]
class XmlDataResult
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private ?int $year = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $dataValue = null;

    #[ORM\ManyToOne(inversedBy: 'XmlData')]
    private ?GetXmlData $getXmlData = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getYear(): ?int
    {
        return $this->year;
    }

    public function setYear(?int $year): self
    {
        $this->year = $year;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getDataValue(): ?string
    {
        return $this->dataValue;
    }

    public function setDataValue(?string $dataValue): self
    {
        $this->dataValue = $dataValue;

        return $this;
    }

    public function getGetXmlData(): ?GetXmlData
    {
        return $this->getXmlData;
    }

    public function setGetXmlData(?GetXmlData $getXmlData): self
    {
        $this->getXmlData = $getXmlData;

        return $this;
    }
}
