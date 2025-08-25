<?php
require("../../require/database_connection.php");

class Products
{

    public static function add_product($product_name, $description, $price, $stock_quantity, $category_id, $product_image, $connection)
    {
        // Escape values to prevent SQL injection
        $product_name = mysqli_real_escape_string($connection->connection, $product_name);
        $description = mysqli_real_escape_string($connection->connection, $description);
        $price = mysqli_real_escape_string($connection->connection, $price);
        $stock_quantity = mysqli_real_escape_string($connection->connection, $stock_quantity);
        $category_id = mysqli_real_escape_string($connection->connection, $category_id);
        $product_image = mysqli_real_escape_string($connection->connection, $product_image);

        $query = "INSERT INTO products (product_name, description, price, stock_quamtitiy, category_id, image_path) 
                  VALUES ('$product_name', '$description', '$price', '$stock_quantity', '$category_id', '$product_image')";
        return mysqli_query($connection->connection, $query) ? true : false;
    }

    public static function upload_image($file)
    {
        $target_dir = "../../uploads/";

        // Create folder if it doesn't exist
        if (!is_dir($target_dir)) {
            mkdir($target_dir, 0777, true);
        }

        // Generate unique filename
        $file_name = time() . "_" . basename($file["name"]);
        $target_file = $target_dir . $file_name;

        // Get file extension
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Allowed extensions
        $allowed_extensions = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowed_extensions)) {
            return false; // Invalid file type
        }

        // Move uploaded file
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            return $file_name;
        }
        return false;
    }

    public static function delete_product($product_id, $connection)
    {
        $product_id = (int) $product_id; // Ensure integer
        $query = "DELETE FROM products WHERE product_id = '$product_id'";
        return mysqli_query($connection->connection, $query) ? true : false;
    }

    public static function delete_category($id, $connection)
    {

        $id = intval($id);

        $query = "DELETE FROM categories WHERE category_id = '$id'";
        $result = mysqli_query($connection->connection, $query);

        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    public static function get_category($id, $connection)
    {
        $query = "SELECT * from categories WHERE category_id = '$id'";
        $result = mysqli_query($connection->connection, $query);
        if ($result) {
            $row = mysqli_fetch_assoc($result);
            return $row;
        } else {
            return false;
        }
    }

    public static function update_category($category_id, $category_name, $connection)
    {

        $query = "UPDATE categories SET category_name = '$category_name' WHERE category_id = '$category_id'";
        $result = mysqli_query($connection->connection, $query);
        return $result ? true : false;

    }


    // getting Total orders
}

// Add product
if (isset($_REQUEST['submit']) && $_REQUEST['submit'] == 'add_product') {
    $product = new Products();

    $uploaded_image = false;
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $uploaded_image = $product->upload_image($_FILES['product_image']);
    }

    if ($uploaded_image) {
        $result = $product->add_product($_REQUEST['product_name'], $_REQUEST['description'], $_REQUEST['price'], $_REQUEST['stock_quantity'], $_REQUEST['category_id'], $uploaded_image, $connection);

        header("Location: ../products.php?msg=" . ($result ? "Product added successfully." : "Failed to add product."));
    } else {
        header("Location: ../products.php?msg=Failed to upload image.");
    }
    exit;
}

// Delete product
elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete_product") {
    $delete_product = new Products();
    $result = $delete_product->delete_product($_REQUEST['id'], $connection);
    echo $result ? "<p>Product deleted successfully.</p>" : "<p>Failed to delete product.</p>";
    exit;
} elseif (isset($_REQUEST["submit"]) && $_REQUEST['submit'] === "add_category") {
    // Handle adding a new category
    $category_name = mysqli_real_escape_string($connection->connection, $_REQUEST['category_name']);
    $query = "INSERT INTO categories (category_name) VALUES ('$category_name')";
    $result = mysqli_query($connection->connection, $query);

    if ($result) {
        header("Location: ../category.php?msg=Category added successfully.");
    } else {
        header("Location: ../category.php?msg=Failed to add category.");
    }
} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "delete_category") {
    $id = $_REQUEST['id'];

    $category = new products();
    $category->delete_category($id, $connection);
    if ($category) {
        echo "<p>Category Deleted Successfully</p>";
    } else {
        echo "<p>Category Can Not be deleted </p>";

    }

} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "get_category") {
    $id = isset($_REQUEST['id']) ? $_REQUEST['id'] : "";

    if ($id) {
        $category = new products();
        $row = $category->get_category($id, $connection);

        if ($row && is_array($row)) {
            echo json_encode([
                "category_id" => $row['category_id'],
                "category_name" => $row['category_name']
            ]);
        } else {
            echo json_encode(false);
        }
    } else {
        echo json_encode(false);
    }

} elseif (isset($_REQUEST['action']) && $_REQUEST['action'] == "update_category") {
    $id = $_REQUEST['id'];
    $category_name = $_REQUEST['category_name'];

    $category = new Products();
    $result = $category->update_category($id, $category_name, $connection);

    echo $result ? "<p>Category updated successfully.</p>" : "<p>Failed to update category.</p>";
}



?>