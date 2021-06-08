<?php

namespace App\Entity;

use App\Repository\GuildRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=GuildRepository::class)
 * @ORM\Table(schema="player", name="guild")
 */
class Guild
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=12)
     */
    private $name;

    /**
     * @ORM\Column(type="smallint")
     */
    private $sp;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="integer")
     */
    private $exp;

    /**
     * @ORM\Column(type="integer")
     */
    private $skillPoint;

    /**
     * @ORM\Column(type="integer")
     */
    private $win;

    /**
     * @ORM\Column(type="integer")
     */
    private $draw;

    /**
     * @ORM\Column(type="integer")
     */
    private $loss;

    /**
     * @ORM\Column(type="integer")
     */
    private $ladderPoint;

    /**
     * @ORM\Column(type="integer")
     */
    private $gold;

    /**
     * @ORM\OneToMany(targetEntity=GuildMember::class, mappedBy="guildId", orphanRemoval=true)
     */
    private $guildMembers;

    /**
     * @ORM\OneToMany(targetEntity=GuildGrade::class, mappedBy="guildId", orphanRemoval=true)
     */
    private $guildGrades;

    /**
     * @ORM\Column(type="integer")
     */
    private $master;

    public function __construct()
    {
        $this->guildMembers = new ArrayCollection();
        $this->guildGrades = new ArrayCollection();
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

    public function getSp(): ?int
    {
        return $this->sp;
    }

    public function setSp(int $sp): self
    {
        $this->sp = $sp;

        return $this;
    }

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getExp(): ?int
    {
        return $this->exp;
    }

    public function setExp(int $exp): self
    {
        $this->exp = $exp;

        return $this;
    }

    public function getSkillPoint(): ?int
    {
        return $this->skillPoint;
    }

    public function setSkillPoint(int $skillPoint): self
    {
        $this->skillPoint = $skillPoint;

        return $this;
    }

    public function getWin(): ?int
    {
        return $this->win;
    }

    public function setWin(int $win): self
    {
        $this->win = $win;

        return $this;
    }

    public function getDraw(): ?int
    {
        return $this->draw;
    }

    public function setDraw(int $draw): self
    {
        $this->draw = $draw;

        return $this;
    }

    public function getLoss(): ?int
    {
        return $this->loss;
    }

    public function setLoss(int $loss): self
    {
        $this->loss = $loss;

        return $this;
    }

    public function getLadderPoint(): ?int
    {
        return $this->ladderPoint;
    }

    public function setLadderPoint(int $ladderPoint): self
    {
        $this->ladderPoint = $ladderPoint;

        return $this;
    }

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(int $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    /**
     * @return Collection|GuildMember[]
     */
    public function getGuildMembers(): Collection
    {
        return $this->guildMembers;
    }

    public function addGuildMember(GuildMember $guildMember): self
    {
        if (!$this->guildMembers->contains($guildMember)) {
            $this->guildMembers[] = $guildMember;
            $guildMember->setGuildId($this);
        }

        return $this;
    }

    public function removeGuildMember(GuildMember $guildMember): self
    {
        if ($this->guildMembers->removeElement($guildMember)) {
            // set the owning side to null (unless already changed)
            if ($guildMember->getGuildId() === $this) {
                $guildMember->setGuildId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|GuildGrade[]
     */
    public function getGuildGrades(): Collection
    {
        return $this->guildGrades;
    }

    public function addGuildGrade(GuildGrade $guildGrade): self
    {
        if (!$this->guildGrades->contains($guildGrade)) {
            $this->guildGrades[] = $guildGrade;
            $guildGrade->setGuildId($this);
        }

        return $this;
    }

    public function removeGuildGrade(GuildGrade $guildGrade): self
    {
        if ($this->guildGrades->removeElement($guildGrade)) {
            // set the owning side to null (unless already changed)
            if ($guildGrade->getGuildId() === $this) {
                $guildGrade->setGuildId(null);
            }
        }

        return $this;
    }

    public function getMaster(): ?int
    {
        return $this->master;
    }

    public function setMaster(int $master): self
    {
        $this->master = $master;

        return $this;
    }
}
