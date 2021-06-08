<?php

namespace App\Entity;

use App\Repository\GuildMemberRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuildMemberRepository::class)
 * @ORM\Table(schema="player", name="guild_member")
 */
class GuildMember
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=Player::class, cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $pid;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $grade;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isGeneral;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $offer;

    /**
     * @ORM\ManyToOne(targetEntity=Guild::class, inversedBy="guildMembers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $guildId;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPid(): ?Player
    {
        return $this->pid;
    }

    public function setPid(Player $pid): self
    {
        $this->pid = $pid;

        return $this;
    }

    public function getGrade(): ?int
    {
        return $this->grade;
    }

    public function setGrade(?int $grade): self
    {
        $this->grade = $grade;

        return $this;
    }

    public function getIsGeneral(): ?bool
    {
        return $this->isGeneral;
    }

    public function setIsGeneral(bool $isGeneral): self
    {
        $this->isGeneral = $isGeneral;

        return $this;
    }

    public function getOffer(): ?int
    {
        return $this->offer;
    }

    public function setOffer(?int $offer): self
    {
        $this->offer = $offer;

        return $this;
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
}
