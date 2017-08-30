<?php

namespace Blog\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Setting
 *
 * @ORM\Table(name="setting")
 * @ORM\Entity(repositoryClass="Blog\ModelBundle\Repository\SettingRepository")
 */
class Setting
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="settingKey", type="string", length=255, unique=true)
     */
    private $settingKey;

    /**
     * @var bool
     *
     * @ORM\Column(name="settingSwitch", type="boolean")
     */
    private $settingSwitch;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set settingKey
     *
     * @param string $settingKey
     *
     * @return Setting
     */
    public function setSettingKey($settingKey)
    {
        $this->settingKey = $settingKey;

        return $this;
    }

    /**
     * Get settingKey
     *
     * @return string
     */
    public function getSettingKey()
    {
        return $this->settingKey;
    }

    /**
     * @param $settingSwitch
     * @return $this
     */
    public function setSettingSwitch($settingSwitch)
    {
        $this->settingSwitch = $settingSwitch;

        return $this;
    }

    /**
     * @return bool
     */
    public function getSettingSwitch()
    {
        return $this->settingSwitch;
    }
}

