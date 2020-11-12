<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Books
 *
 * @ORM\Entity(repositoryClass="App\Repository\BooksRepository")
 * @ORM\Table(name="books")
 */
class Books
{
    /**
     * @var int
     *
     * @ORM\Column(name="book_id", type="integer", nullable=false, options={"unsigned"=true})
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $bookId;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_name", type="string", length=255, nullable=true)
     */
    private $bookName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_author_name", type="string", length=255, nullable=true)
     */
    private $bookAuthorName;

    /**
     * @var string|null
     *
     * @ORM\Column(name="book_year", type="string", length=4, nullable=true, options={"fixed"=true})
     */
    private $bookYear;

    public function getBookId(): ?int
    {
        return $this->bookId;
    }

    public function getBookName(): ?string
    {
        return $this->bookName;
    }

    public function setBookName(?string $bookName): self
    {
        $this->bookName = $bookName;

        return $this;
    }

    public function getBookAuthorName(): ?string
    {
        return $this->bookAuthorName;
    }

    public function setBookAuthorName(?string $bookAuthorName): self
    {
        $this->bookAuthorName = $bookAuthorName;

        return $this;
    }

    public function getBookYear(): ?string
    {
        return $this->bookYear;
    }

    public function setBookYear(?string $bookYear): self
    {
        $this->bookYear = $bookYear;

        return $this;
    }


}
