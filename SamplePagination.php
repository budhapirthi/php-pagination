<?php
/**
 * This is only a sample example to use Pagination class to display your products 
 *
 */

$intCurrentPage = $_GET['page'];

// Assume this is the total count of the products [SELECT COUNT(*)]
$intTotalProducts = 100; 

// Assume you want to display 10 products per page
$intProductsPerPage = 10;

$objPagination =  new Pagination($intCurrentPage, $intProductsPerPage, $intTotalProducts);

// This is where you get the data from db by runnig the query passing the offset for each page 
// Create a seperate function for this where you can pass offset and items per page, so that you can reuse it
$sql = "SELECT * FROM products ";
        $sql .= "LIMIT {$this->offset()} {$this->intItemsPerPage} ";
        $this->query($sql);
        
// Let assume this is the result from query 
$arrProducts = [["product_id" => 1, "product_name" => "Orange"],["product_id" => 2, "product_name" => "Tomato"]...];
?>

<!-- Display the products in this row -->
<div class="row">
        <ul class="products">
                <?php
                
                foreach($arrProducts as $arrProduct){
                        echo "<li>{$arrProduct['product_name']}</li>";
                }
                ?>
        </ul>
</div>

<!-- Start pagination in here: you can put pagination at the bottom or top the products -->
<div class="row">
    <ul class="pages">

        <?php
         // Check if have there is any pages at all
         if ($objPagination->intPageTotal > 1){

             // Check if are next itme 
             if ($objPagination->hasNext()){
                 echo '<li class="next"><a href="SamplePagiation.php?page="'.$objPagination->next().'">Next</a> </li>';
             }
             // Show number of pages until the total pages 
             for ($i = 1; $i <= $objPagination->intPageTotal(); $i++){
                 if ($i === $objPagination->intCurrentPage){
                     echo '<li><a href="SamplePagiation.php?page="'.$i.'">"'.$i.'"</a> </li>';
                 } else{
                     echo '<li>"'.$i.'"</li>';
                 }
             }

             // This button only shows if there are no less page than 1
             if ($objPagination->hasPrevious()){
                 echo  '<li class="previous"><a href="SamplePagiation.php?page="'.$objPagination->previous().'">Previous</a></li>';
             }
         }

        ?>
    </ul>
    
</div>
