<?php

/**
 * Class Pagination
 *
 * @version 1.0
 * @author  Bishal Budhapirthi <bishalbudhapirthi@gmail.com>
 * @created 04-08-2018
 */
class Pagination
{
    /**
     * @var
     */
    public $intCurrentPage;

    /**
     * @var
     */
    public $intItemsPerPage;

    /**
     * @var
     */
    public $intItemsTotalCounts;

    /**
     * Pagination constructor.
     */
    public function __construct($intPage = 1, $itemsPerPage = 4, $itemsTotalCount = 0)
    {
        $this->intCurrentPage = $intPage;
        $this->intItemsPerPage = $itemsPerPage;
        $this->intItemsTotalCounts = $itemsTotalCount;
    }

    /**
     * Get the next page from the current page
     *
     * @return int
     */
    public function next()
    {
        return $this->intCurrentPage + 1;
    }

    /**
     * Get the previous page from the current page
     *
     * @return int
     */
    public function previous()
    {
        return $this->intCurrentPage - 1;
    }

    /**
     * Get total pages
     *
     * @return float
     */
    public function pageTotal()
    {
        return ceil($this->intItemsTotalCounts / $this->intItemsPerPage);
    }

    /**
     * Check if there are previous page
     *
     * @return bool
     */
    public function hasPrevious()
    {
        return $this->previous() >= 1 ? true : false;
    }

    /**
     * Checks if there are any more next page
     *
     * @return bool
     */
    public function hasNext()
    {
        return $this->next() <= $this->pageTotal() ? true : false;
    }

    /**
     * Understanding offset, 
     * Lets say items per page is 10, below is how offset is calculated based on current page 
     * 1 = (1 -1) * 10; LITMIT 0, 10 // return only 10 records, start on record 1 (OFFSET 0)
     * 2 = (2 -1) * 10; LITMIT 10, 10 // return only 10 records, start on record 11 (OFFSET 10)
     * 3 = (3 -1) * 10; LITMIT 20, 10 // return only 10 records, start on record 21(OFFSET 20)
     * 4 = (4 -1) * 10; LITMIT 30, 10 // return only 10 records, start on record 31(OFFSET 30)
     *
     * @return float|int
     */
    public function offset()
    {
        return ($this->intCurrentPage -1) * $this->intItemsPerPage;
    }
 }
 ?>

