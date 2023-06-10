<?php
if (isset($_POST['checkedList'])) {
    var_dump($_POST['checkedList']);
    include("connect.php");
    $checkedLists = $_POST['checkedList'];
     //using implode to convert array to string and seperate them by a comma.
    $checkedListss = "'" .implode(",", $checkedLists). "'";
   
    //using in to delete multiple records instead of a foreach loop

    $sqlDelete = "DELETE FROM productList WHERE sku IN ($checkedListss)";
    if (mysqli_query($conn, $sqlDelete)) {
        session_start();
        $_SESSION["delete"] = "Product Deleted Successfully!";
        header("Location:index.php");
    } else {
        die("Something went wrong");
    }
}
?>