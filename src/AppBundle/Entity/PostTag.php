<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PostTag
 *
 * @ORM\Table(name="post_tag")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostTagRepository")
 */
class PostTag
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
     * @var int
     *
     * @ORM\Column(name="post_id", type="integer")
     */
    private $postId;

    /**
     * @var int
     *
     * @ORM\Column(name="tag_id", type="integer")
     */
    private $tagId;


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
     * Set postId
     *
     * @param integer $postId
     *
     * @return PostTag
     */
    public function setPostId($postId)
    {
        $this->postId = $postId;

        return $this;
    }

    /**
     * Get postId
     *
     * @return int
     */
    public function getPostId()
    {
        return $this->postId;
    }

    /**
     * Set tagId
     *
     * @param integer $tagId
     *
     * @return PostTag
     */
    public function setTagId($tagId)
    {
        $this->tagId = $tagId;

        return $this;
    }

    /**
     * Get tagId
     *
     * @return int
     */
    public function getTagId()
    {
        return $this->tagId;
    }
}

