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
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\Validator\Constraints as Assert;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Penguin
 *
 * @ORM\Entity
 *
 * @Vich\Uploadable
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
     *
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
     * @var \DateTime
     *
     * @ORM\Column(type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @var \Symfony\Component\HttpFoundation\File\File
     *
     * @Assert\Image
     *
     * @Vich\UploadableField(mapping="penguin_image", fileNameProperty="image")
     */
    private $imageFile;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->addedAt = new \DateTimeImmutable();
        $this->refreshUpdatedAt();
    }

    /**
     * @param \Symfony\Component\HttpFoundation\File\File $imageFile imageFile
     *
     * @return Penguin
     */
    public function setImageFile(File $imageFile = null)
    {
        $this->imageFile = $imageFile;

        if (!empty($imageFile)) {
            $this->refreshUpdatedAt();
        }

        return $this;
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

    /**
     * @param \DateTime $updatedAt updatedAt
     *
     * @return Penguin
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param string $image image
     *
     * @return Penguin
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * @return string
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\File\File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }

    private function refreshUpdatedAt()
    {
        $this->updatedAt = new \DateTimeImmutable();
    }
}
