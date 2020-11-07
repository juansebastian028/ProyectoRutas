<?php

class Paginacion{

    private $currentPage;
    private $startRowNumber;
    private $limitRowNumber;
    private $totalPages;
    private $numRows;

    public function __construct($numRows,$limitRowNumber){
        
        $this->numRows = $numRows;
        $this->limitRowNumber = $limitRowNumber;
        $this->currentPage = 1;
        $this->validateStartRowNumber();
        $this->totalPages = ceil($this->numRows/$this->limitRowNumber);

    }

    public function updateCurrentPage($currentPage){
        
        $this->currentPage = $currentPage;
        $this->validateStartRowNumber();
        
    }

    private function validateStartRowNumber(){

        $this->startRowNumber = ($this->currentPage-1) * $this->limitRowNumber;
    }

    //Getters
    public function getTotalPages(){
        return $this->totalPages;
    }

    
    public function getStartRowNumber(){
        return $this->startRowNumber;
    }

    
    public function getLimitRowNumber(){
        return $this->limitRowNumber;
    }

}