<?php
include 'db.php';

// Set content type to JSON
header('Content-Type: application/json');

$limit = 12;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * $limit;

$whereClauses = [];

// Sanitize and validate input

if (isset($_GET['category']) && $_GET['category'] !== '') {
    $category = $conn->real_escape_string($_GET['category']);
    $whereClauses[] = "category = '$category'";
}

if (isset($_GET['sale_status']) && $_GET['sale_status'] !== '') {
    $sale_status = $conn->real_escape_string($_GET['sale_status']);
    $whereClauses[] = "sale_status = '$sale_status'";
}

if (isset($_GET['min_price']) && isset($_GET['max_price'])) {
    $min_price = intval(($_GET['min_price']== NULL)? 0 :$_GET['min_price']);
    $max_price = intval(($_GET['max_price']== NULL)? PHP_INT_MAX : $_GET['min_price']);
    if ($min_price > $max_price) {
        $temp= $max_price;
        $max_price = $min_price; 
        $min_price= $temp;
    }
    $whereClauses[] = "price BETWEEN $min_price AND $max_price";
}

$whereSQL = '';
if (count($whereClauses) > 0) {
    $whereSQL = 'WHERE ' . implode(' AND ', $whereClauses);
}

// Query for products
$sql = "SELECT * FROM products $whereSQL LIMIT $limit OFFSET $offset";
$result = $conn->query($sql);

$products = [];
if ($result) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    // Handle query error
    echo json_encode(['error' => 'Error fetching products: ' . $conn->error]);
    exit();
}

// Query for total count
$sqlTotal = "SELECT COUNT(*) AS total FROM products $whereSQL";
$resultTotal = $conn->query($sqlTotal);
if ($resultTotal) {
    $total = $resultTotal->fetch_assoc()['total'];
    $totalPages = ceil($total / $limit);
} else {
    // Handle query error
    echo json_encode(['error' => 'Error counting products: ' . $conn->error]);
    exit();
}

echo json_encode(['products' => $products, 'totalPages' => $totalPages]);

$conn->close();
?>