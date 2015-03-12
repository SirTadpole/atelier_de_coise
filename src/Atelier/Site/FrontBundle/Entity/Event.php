<?php

namespace Atelier\Site\FrontBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Event
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Atelier\Site\FrontBundle\Entity\EventRepository")
 */
class Event
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
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="datetime")
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="localisation", type="text")
     */
    private $localisation;

    /**
     * @ORM\ManyToOne(targetEntity="Article", inversedBy="events", cascade={"remove"})
     * @ORM\JoinColumn(name="article_id", referencedColumnName="id")
     */
    protected $article;


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
     * Set date
     *
     * @param \DateTime $date
     * @return Event
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     * @return Event
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;

        return $this;
    }

    /**
     * Get localisation
     *
     * @return string 
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set article
     *
     * @param \Atelier\Site\FrontBundle\Entity\Article $article
     * @return Event
     */
    public function setArticle(\Atelier\Site\FrontBundle\Entity\Article $article = null)
    {
        $this->article = $article;

        return $this;
    }

    /**
     * Get article
     *
     * @return \Atelier\Site\FrontBundle\Entity\Article 
     */
    public function getArticle()
    {
        return $this->article;
    }
}
