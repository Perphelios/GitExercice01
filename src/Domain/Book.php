<?php
namespace MyBooks\Domain;

/**
 * Class Book
 *
 * @package MyBooks\Domain
 */
class Book
{
    /**
     * Book id.
     *
     * @var integer
     */
    private $id;

    /**
     * Book title.
     *
     * @var string
     */
    private $title;

    /**
     * Book summary.
     *
     * @var string
     */
    private $summary;

    /**
     * Book isbn.
     *
     * @var string
     */
    private $isbn;

    /**
     * Associated author.
     *
     * @var /MyBooks/Domain/Author
     */
    private $author;

    /**
     * @return MyBooks/Domain/Author
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param MyBooks/Domain/Author $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return int
     */
    public function getId() {
        return $this->id;
    }

    /**
     * @param $id
     * @return $this
     */
    public function setId($id) {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle() {
        return $this->title;
    }

    /**
     * @param $title
     * @return $this
     */
    public function setTitle($title) {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getSummary() {
        return $this->summary;
    }

    /**
     * @param $summary
     * @return $this
     */
    public function setSummary($summary) {
        $this->summary = $summary;
        return $this;
    }

    /**
     * @return string
     */
    public function getIsbn()
    {
        return $this->isbn;
    }

    /**
     * @param string $isbn
     */
    public function setIsbn($isbn)
    {
        $this->isbn = $isbn;
    }

}