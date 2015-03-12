<?php

namespace Atelier\Site\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Article
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Atelier\Site\FrontBundle\Entity\ArticleRepository")
 */
class Article
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255, unique=true)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="summary", type="text")
     */
    private $summary;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="author", type="string", length=255)
     */
    private $author;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=true)
     */
    private $updatedAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_enabled", type="boolean")
     */
    private $isEnabled;

    /**
     * @ORM\OneToMany(targetEntity="Comment", mappedBy="desk", cascade={"remove", "persist"})
     */
    protected $comments;

    /**
     * @ORM\OneToMany(targetEntity="Event", mappedBy="article", cascade={"remove", "persist"})
     * @ORM\JoinColumn(name="events_id", referencedColumnName="id", nullable=true)
     */
    private $events;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(name="media_pict_id", referencedColumnName="id", nullable=true)
     */
    protected $media_pict;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(name="media_video_id", referencedColumnName="id", nullable=true)
     */
    protected $media_video;

    /**
     * @var \Application\Sonata\MediaBundle\Entity\Media
     * @ORM\ManyToOne(targetEntity="Application\Sonata\MediaBundle\Entity\Media", cascade={"persist"}, fetch="LAZY")
     * @ORM\JoinColumn(name="media_file_id", referencedColumnName="id", nullable=true)
     */
    protected $media_file;

    /**
    * Constructor
    */
    public function __construct()
    {
      $this->createdAt = new \DateTime('now');
      $this->isEnabled = FALSE;
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Article
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set summary
     *
     * @param string $summary
     * @return Article
     */
    public function setSummary($summary)
    {
        $this->summary = $summary;

        return $this;
    }

    /**
     * Get summary
     *
     * @return string 
     */
    public function getSummary()
    {
        return $this->summary;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Article
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set author
     *
     * @param string $author
     * @return Article
     */
    public function setAuthor($author)
    {
        $this->author = $author;

        return $this;
    }

    /**
     * Get author
     *
     * @return string 
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Article
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
     * @return Article
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

    /**
     * Set isEnabled
     *
     * @param boolean $isEnabled
     * @return Article
     */
    public function setIsEnabled($isEnabled)
    {
        $this->isEnabled = $isEnabled;

        return $this;
    }

    /**
     * Get isEnabled
     *
     * @return boolean 
     */
    public function getIsEnabled()
    {
        return $this->isEnabled;
    }

    /**
     * Add comments
     *
     * @param \Atelier\Site\FrontBundle\Entity\Comment $comments
     * @return Article
     */
    public function addComment(\Atelier\Site\FrontBundle\Entity\Comment $comments)
    {
        $this->comments[] = $comments;

        return $this;
    }

    /**
     * Remove comments
     *
     * @param \Atelier\Site\FrontBundle\Entity\Comment $comments
     */
    public function removeComment(\Atelier\Site\FrontBundle\Entity\Comment $comments)
    {
        $this->comments->removeElement($comments);
    }

    /**
     * Get comments
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getComments()
    {
        return $this->comments;
    }

    /**
     * Set event
     *
     * @param \Atelier\Site\FrontBundle\Entity\Event $event
     * @return Article
     */
    public function setEvent(\Atelier\Site\FrontBundle\Entity\Event $event = null)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * Get event
     *
     * @return \Atelier\Site\FrontBundle\Entity\Event 
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param MediaInterface $media
     */
    public function setMedia(MediaInterface $media)
    {
      $this->media = $media;
    }

    /**
     * @return MediaInterface
     */
    public function getMedia()
    {
      return $this->media;
    }

    /**
     * Add events
     *
     * @param \Atelier\Site\FrontBundle\Entity\Event $events
     * @return Article
     */
    public function addEvent(\Atelier\Site\FrontBundle\Entity\Event $events)
    {
        $this->events[] = $events;

        return $this;
    }

    /**
     * Remove events
     *
     * @param \Atelier\Site\FrontBundle\Entity\Event $events
     */
    public function removeEvent(\Atelier\Site\FrontBundle\Entity\Event $events)
    {
        $this->events->removeElement($events);
    }

    /**
     * Get events
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEvents()
    {
        return $this->events;
    }

    /**
     * Set media_pict
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $mediaPict
     * @return Article
     */
    public function setMediaPict(\Application\Sonata\MediaBundle\Entity\Media $mediaPict = null)
    {
        $this->media_pict = $mediaPict;

        return $this;
    }

    /**
     * Get media_pict
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getMediaPict()
    {
        return $this->media_pict;
    }

    /**
     * Set media_video
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $mediaVideo
     * @return Article
     */
    public function setMediaVideo(\Application\Sonata\MediaBundle\Entity\Media $mediaVideo = null)
    {
        $this->media_video = $mediaVideo;

        return $this;
    }

    /**
     * Get media_video
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getMediaVideo()
    {
        return $this->media_video;
    }

    /**
     * Set media_file
     *
     * @param \Application\Sonata\MediaBundle\Entity\Media $mediaFile
     * @return Article
     */
    public function setMediaFile(\Application\Sonata\MediaBundle\Entity\Media $mediaFile = null)
    {
        $this->media_file = $mediaFile;

        return $this;
    }

    /**
     * Get media_file
     *
     * @return \Application\Sonata\MediaBundle\Entity\Media 
     */
    public function getMediaFile()
    {
        return $this->media_file;
    }
}
