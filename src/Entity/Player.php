<?php

namespace App\Entity;

use App\Repository\PlayerRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PlayerRepository::class)
 * @ORM\Table(schema="player", name="player")
 */
class Player
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=24)
     */
    private $name;

    /**
     * @ORM\Column(type="integer")
     */
    private $job;

    /**
     * @ORM\Column(type="integer")
     */
    private $level;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastPlay;

    /**
     * @ORM\Column(type="integer")
     */
    private $playtime;

    /**
     * @ORM\Column(type="integer")
     */
    private $levelStep;

    /**
     * @ORM\Column(type="integer")
     */
    private $exp;

    /**
     * @ORM\Column(type="integer")
     */
    private $gold;

    /**
     * @ORM\Column(type="string", length=15, nullable=true)
     */
    private $ip;

    /**
     * @ORM\Column(type="integer")
     */
    private $x;

    /**
     * @ORM\Column(type="integer")
     */
    private $y;

    /**
     * @ORM\Column(type="integer")
     */
    private $z;

    /**
     * @ORM\Column(type="integer")
     */
    private $mapIndex;

    /**
     * @ORM\Column(type="integer")
     */
    private $exitX;

    /**
     * @ORM\Column(type="integer")
     */
    private $exitY;

    /**
     * @ORM\Column(type="integer")
     */
    private $exitMapIndex;

    /**
     * @ORM\Column(type="smallint")
     */
    private $hp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $mp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $stamina;

    /**
     * @ORM\Column(type="smallint")
     */
    private $st;

    /**
     * @ORM\Column(type="smallint")
     */
    private $ht;

    /**
     * @ORM\Column(type="smallint")
     */
    private $dx;

    /**
     * @ORM\Column(type="smallint")
     */
    private $iq;

    /**
     * @ORM\Column(type="smallint")
     */
    private $statPoint;

    /**
     * @ORM\Column(type="smallint")
     */
    private $skillPoint;

    /**
     * @ORM\Column(type="smallint")
     */
    private $horseHp;

    /**
     * @ORM\Column(type="smallint")
     */
    private $horseStamina;

    /**
     * @ORM\Column(type="integer")
     */
    private $horseLevel;

    /**
     * @ORM\ManyToOne(targetEntity=Account::class, inversedBy="players")
     */
    private $account;

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

    public function getJob(): ?int
    {
        return $this->job;
    }

    public function setJob(int $job): self
    {
        $this->job = $job;

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

    public function getLastPlay(): ?\DateTimeInterface
    {
        return $this->lastPlay;
    }

    public function setLastPlay(\DateTimeInterface $lastPlay): self
    {
        $this->lastPlay = $lastPlay;

        return $this;
    }

    public function getPlaytime(): ?int
    {
        return $this->playtime;
    }

    public function setPlaytime(int $playtime): self
    {
        $this->playtime = $playtime;

        return $this;
    }

    public function getLevelStep(): ?int
    {
        return $this->levelStep;
    }

    public function setLevelStep(int $levelStep): self
    {
        $this->levelStep = $levelStep;

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

    public function getGold(): ?int
    {
        return $this->gold;
    }

    public function setGold(int $gold): self
    {
        $this->gold = $gold;

        return $this;
    }

    public function getIp(): ?string
    {
        return $this->ip;
    }

    public function setIp(?string $ip): self
    {
        $this->ip = $ip;

        return $this;
    }

    public function getX(): ?int
    {
        return $this->x;
    }

    public function setX(int $x): self
    {
        $this->x = $x;

        return $this;
    }

    public function getY(): ?int
    {
        return $this->y;
    }

    public function setY(int $y): self
    {
        $this->y = $y;

        return $this;
    }

    public function getZ(): ?int
    {
        return $this->z;
    }

    public function setZ(int $z): self
    {
        $this->z = $z;

        return $this;
    }

    public function getMapIndex(): ?int
    {
        return $this->mapIndex;
    }

    public function setMapIndex(int $mapIndex): self
    {
        $this->mapIndex = $mapIndex;

        return $this;
    }

    public function getExitX(): ?int
    {
        return $this->exitX;
    }

    public function setExitX(int $exitX): self
    {
        $this->exitX = $exitX;

        return $this;
    }

    public function getExitY(): ?int
    {
        return $this->exitY;
    }

    public function setExitY(int $exitY): self
    {
        $this->exitY = $exitY;

        return $this;
    }

    public function getExitMapIndex(): ?int
    {
        return $this->exitMapIndex;
    }

    public function setExitMapIndex(int $exitMapIndex): self
    {
        $this->exitMapIndex = $exitMapIndex;

        return $this;
    }

    public function getHp(): ?int
    {
        return $this->hp;
    }

    public function setHp(int $hp): self
    {
        $this->hp = $hp;

        return $this;
    }

    public function getMp(): ?int
    {
        return $this->mp;
    }

    public function setMp(int $mp): self
    {
        $this->mp = $mp;

        return $this;
    }

    public function getStamina(): ?int
    {
        return $this->stamina;
    }

    public function setStamina(int $stamina): self
    {
        $this->stamina = $stamina;

        return $this;
    }

    public function getSt(): ?int
    {
        return $this->st;
    }

    public function setSt(int $st): self
    {
        $this->st = $st;

        return $this;
    }

    public function getHt(): ?int
    {
        return $this->ht;
    }

    public function setHt(int $ht): self
    {
        $this->ht = $ht;

        return $this;
    }

    public function getDx(): ?int
    {
        return $this->dx;
    }

    public function setDx(int $dx): self
    {
        $this->dx = $dx;

        return $this;
    }

    public function getIq(): ?int
    {
        return $this->iq;
    }

    public function setIq(int $iq): self
    {
        $this->iq = $iq;

        return $this;
    }

    public function getStatPoint(): int
    {
        return $this->statPoint;
    }

    public function setStatPoint(int $statPoint): self
    {
        $this->statPoint = $statPoint;

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

    public function getHorseHp(): ?int
    {
        return $this->horseHp;
    }

    public function setHorseHp(int $horseHp): self
    {
        $this->horseHp = $horseHp;

        return $this;
    }

    public function getHorseStamina(): ?int
    {
        return $this->horseStamina;
    }

    public function setHorseStamina(int $horseStamina): self
    {
        $this->horseStamina = $horseStamina;

        return $this;
    }

    public function getHorseLevel(): ?int
    {
        return $this->horseLevel;
    }

    public function setHorseLevel(int $horseLevel): self
    {
        $this->horseLevel = $horseLevel;

        return $this;
    }

    public function getAccount(): ?Account
    {
        return $this->account;
    }

    public function setAccount(?Account $account): self
    {
        $this->account = $account;

        return $this;
    }
}
