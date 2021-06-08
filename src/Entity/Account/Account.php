<?php

namespace App\Entity\Account;

use App\Repository\AccountRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AccountRepository::class)
 */
class Account
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30)
     */
    private $login;

    /**
     * @ORM\Column(type="string", length=45)
     */
    private $password;

    /**
     * @ORM\Column(type="string", length=16, nullable=true)
     */
    private $realName;

    /**
     * @ORM\Column(type="string", length=13)
     */
    private $socialId;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $email;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $createTime;

    /**
     * @ORM\Column(type="boolean", name="isOnline")
     */
    private $isOnline;

    /**
     * @ORM\Column(type="string", length=8)
     */
    private $status;

    /**
     * @ORM\Column(type="integer")
     */
    private $coins;

    /**
     * @ORM\Column(type="integer")
     */
    private $webAdmin;

    /**
     * @ORM\Column(type="string", length=15)
     */
    private $webIp;

    /**
     * @ORM\Column(type="datetime")
     */
    private $lastPlay;

    /**
     * @ORM\Column(type="integer")
     */
    private $empire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLogin(): ?string
    {
        return $this->login;
    }

    public function setLogin(string $login): self
    {
        $this->login = $login;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRealName(): ?string
    {
        return $this->realName;
    }

    public function setRealName(string $realName): self
    {
        $this->realName = $realName;

        return $this;
    }

    public function getSocialId(): ?string
    {
        return $this->socialId;
    }

    public function setSocialId(string $socialId): self
    {
        $this->socialId = $socialId;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getCreateTime(): ?\DateTimeInterface
    {
        return $this->createTime;
    }

    public function setCreateTime(?\DateTimeInterface $createTime): self
    {
        $this->createTime = $createTime;

        return $this;
    }

    public function getIsOnline(): ?bool
    {
        return $this->isOnline;
    }

    public function setIsOnline(bool $isOnline): self
    {
        $this->isOnline = $isOnline;

        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;

        return $this;
    }

    public function getCoins(): ?int
    {
        return $this->coins;
    }

    public function setCoins(int $coins): self
    {
        $this->coins = $coins;

        return $this;
    }

    public function getWebAdmin(): ?int
    {
        return $this->webAdmin;
    }

    public function setWebAdmin(int $webAdmin): self
    {
        $this->webAdmin = $webAdmin;

        return $this;
    }

    public function getWebIp(): ?string
    {
        return $this->webIp;
    }

    public function setWebIp(string $webIp): self
    {
        $this->webIp = $webIp;

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

    public function getEmpire(): ?int
    {
        return $this->empire;
    }

    public function setEmpire(int $empire): self
    {
        $this->empire = $empire;

        return $this;
    }
}
