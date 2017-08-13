<?php
/**
 * Created by PhpStorm.
 * User: szabolaszlo
 * Date: 2017.07.30.
 * Time: 9:45
 */

namespace Blog\ModelBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

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
     * @Gedmo\Timestampable(on="create")
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

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


    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Timestampable
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;
        return $this;
    }
    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}