<?php
/**
 * @author    Igor Nikolaev <igor.sv.n@gmail.com>
 * @copyright Copyright (c) 2016, Igor Nikolaev
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Penguin
 *
 * @ORM\Entity
 */
class Penguin
{
    /**
     * @var string
     *
     * @ORM\Column(type="string", unique=true)
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Id
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(type="string")
     * @Assert\NotBlank
     */
    private $title;

    /**
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $addedAt;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addedAt = new \DateTimeImmutable();
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param string $title title
     *
     * @return Penguin
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param \DateTime $addedAt addedAt
     *
     * @return Penguin
     */
    public function setAddedAt(\DateTime $addedAt)
    {
        $this->addedAt = $addedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getAddedAt()
    {
        return $this->addedAt;
    }
}
