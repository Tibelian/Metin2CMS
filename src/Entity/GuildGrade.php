<?php

namespace App\Entity;

use App\Repository\GuildGradeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuildGradeRepository::class)
 * @ORM\Table(schema="player", name="guild_grade")
 */
class GuildGrade
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Guild::class, inversedBy="guildGrades")
     * @ORM\JoinColumn(nullable=false)
     */
    private $guildId;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $auth;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGuildId(): ?Guild
    {
        return $this->guildId;
    }

    public function setGuildId(?Guild $guildId): self
    {
        $this->guildId = $guildId;

        return $this;
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

    public function getAuth(): ?string
    {
        return $this->auth;
    }

    public function setAuth(?string $auth): self
    {
        $this->auth = $auth;

        return $this;
    }
}
