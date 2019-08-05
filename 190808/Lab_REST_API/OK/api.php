<?php
// 一個簡單但可以運作的 REST API，
// 物件導向與MVC課程時，再來寫進化版

$method = $_SERVER['REQUEST_METHOD'];
$url = explode("/", rtrim($_GET["url"], "/") );

$dbLink = @mysqli_connect("localhost", "root", "") or die(mysqli_connect_error());
mysqli_query($dbLink, "set names utf8");
mysqli_select_db($dbLink, "apiDB");

switch ($method . " " . $url[0]) {
    case "POST products":
        insertProduct();
        break;
    case "GET products":
        if (isset($url[1]))
            getProductById($url[1]);
        else
            getProducts();
        break;
    case "PUT products":
        updateProduct($url[1]);
        break;
    case "DELETE products":
        deleteProduct($url[1]);
        break;
    default:
        echo "Thank you";
}
mysqli_close($dbLink);


function getProductById($id) {
    if (!is_numeric($id))
    	die( "id is not a number." );

    global $dbLink;
    $result = mysqli_query($dbLink, 
      "select * from products where productId = " . $id );
    $row = mysqli_fetch_assoc($result);
    echo json_encode($row);
}


function getProducts() {
    global $dbLink;
    $result = mysqli_query($dbLink, 
      "select * from products");
    echo "[";
    while ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    }
    echo "]";
}


function insertProduct() {
    global $dbLink;
    
    $productName = $_POST["productName"];
    $price       = $_POST["price"];
    $quantity    = $_POST["quantity"];
    $commandText = 
        "insert into products "
      . "set productName = '{$productName}' "
      . "  , price       = '{$price}'"
      . "  , quantity    = '{$quantity}'";
    $result = mysqli_query($dbLink, $commandText); 
    
    echo $result;
}


function updateProduct($id) {
    if (! isset ( $id ))
    	die ( "Parameter id not found." );
    if (! is_numeric ( $id ))
        die ( "id not a number." );

    global $dbLink;
    
    parse_str(file_get_contents('php://input'), $putData);
    //echo json_encode($putData);
    //return;
    $productName = $putData["productName"];
    $price       = $putData["price"];
    $quantity    = $putData["quantity"];
    $commandText = 
        "update products "
      . "set productName = '{$productName}' "
      . "  , price       = '{$price}'"
      . "  , quantity    = '{$quantity}'"
      . "  where productId = {$id}";
    mysqli_query($dbLink, $commandText); 
    
    echo "Updated: " . $id;
}


function deleteProduct($id) {
    if (! isset ( $id ))
    	die ( "Parameter id not found." );
    if (! is_numeric ( $id ))
        die ( "id not a number." );

    global $dbLink;
    
    $commandText = 
        "delete from products "
      . "  where productId = {$id}";
    mysqli_query($dbLink, $commandText); 
    
    echo "Deleted: " . $id;
}

?>