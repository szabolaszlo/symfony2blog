<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.07.30.
 * Time: 9:45
 */

namespace Blog\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class TimeStampAble
 * @package Blog\ModelBundle\Entity
 *
 * @ORM\MappedSuperclass
 */
abstract class TimeStampAble
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * Post constructor.
     */
    public function __construct()
    {
        $this->createdAt = new \DateTime();
    }

    /**
     * @param $createdAt
     * @return $this
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
}