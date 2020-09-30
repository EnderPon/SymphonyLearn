<?php

namespace App\Entity;

use App\Repository\RecordRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=RecordRepository::class)
 */
class Record
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $hash;

    /**
     * @ORM\Column(type="text")
     */
    private $encrypted;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $key;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $owner_key;

    /**
     * @ORM\OneToMany(targetEntity=Report::class, mappedBy="record", orphanRemoval=true)
     */
    private $reports;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $file_name;

    public function __construct()
    {
        $this->reports = new ArrayCollection();
    }

    public function __toString(): string
    {
        return $this->name . ' ' . $this->hash;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getHash(): ?string
    {
        return $this->hash;
    }

    public function setHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    public function getEncrypted(): ?string
    {
        return $this->encrypted;
    }

    public function setEncrypted(string $encrypted): self
    {
        $this->encrypted = $encrypted;

        return $this;
    }

    public function getKey(): ?string
    {
        return $this->key;
    }

    public function setKey(?string $key): self
    {
        $this->key = $key;

        return $this;
    }

    public function getOwnerKey(): ?string
    {
        return $this->owner_key;
    }

    public function setOwnerKey(string $owner_key): self
    {
        $this->owner_key = $owner_key;

        return $this;
    }

    /**
     * @return Collection|Report[]
     */
    public function getReports(): Collection
    {
        return $this->reports;
    }

    public function addReport(Report $report): self
    {
        if (!$this->reports->contains($report)) {
            $this->reports[] = $report;
            $report->setRecord($this);
        }

        return $this;
    }

    public function removeReport(Report $report): self
    {
        if ($this->reports->contains($report)) {
            $this->reports->removeElement($report);
            // set the owning side to null (unless already changed)
            if ($report->getRecord() === $this) {
                $report->setRecord(null);
            }
        }

        return $this;
    }

    public function getFileName(): ?string
    {
        return $this->file_name;
    }

    public function setFileName(?string $file_name): self
    {
        $this->file_name = $file_name;

        return $this;
    }
}
