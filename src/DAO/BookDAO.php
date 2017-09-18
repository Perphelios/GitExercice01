<?php
namespace MyBooks\DAO;

use MyBooks\Domain\Book;

/**
 * DAO for books
 *
 * @package MyBooks\DAO
 */
class BookDAO extends DAO
{
    /**
     * Author DAO
     *
     * @var \MyBooks\DAO\AuthorDAO
     */
    private $authorDAO;

    /**
     * Setter for authorDAO attribute
     *
     * @param AuthorDAO $authorDAO
     */
    public function setAuthorDAO(AuthorDAO $authorDAO) {
        $this->authorDAO = $authorDAO;
    }

    /**
     * Return a list of all books, sorted by id (most recent first).
     *
     * @return array A list of all books.
     */
    public function findAll() {
        $sql = "select book_id, book_title, book_summary, book_isbn from book order by book_id desc";
        $result = $this->getDb()->fetchAll($sql);

        // Convert query result to an array of domain objects
        $books = array();
        foreach ($result as $row) {
            $bookId = $row['book_id'];
            $books[$bookId] = $this->buildDomainObject($row);
        }
        return $books;
    }

    /**
     * Return a list of all books, sorted by id (most recent first).
     *
     * @param integer $bookId
     *
     * @return \MyBooks\Domain\Book A book and its author
     * @throws \Exception if no book is found
     */
    public function findBookAndAuthor($bookId) {

        // book_id is not selected by the SQL query
        // The article won't be retrieved during domain objet construction
        $sql = "select * from book where book_id = ?";
        $row = $this->getDb()->fetchAssoc($sql, array($bookId));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No book and author matching this book id " . $bookId);
    }

    /**
     * Creates an Author object based on a DB row.
     *
     * @param array $row The DB row containing Author data.
     * @return \MyBooks\Domain\Book
     */
    protected function buildDomainObject(array $row) {
        $book = new Book();
        $book->setId($row['book_id']);
        $book->setSummary($row['book_summary']);
        $book->setTitle($row['book_title']);
        $book->setIsbn($row['book_isbn']);
        if (array_key_exists('auth_id', $row)) {
            // Find and set the associated author
            $authId = $row['auth_id'];
            $author = $this->authorDAO->find($authId);
            $book->setAuthor($author);
        }
        return $book;
    }

}