<?php

session_start(); // Always start session at the top

if (isset($_SESSION['user']) && isset($_SESSION['user']['role_id'])) {

    if ((int) $_SESSION['user']['role_id'] === 1) {

        class admin_configs
        {

            public static function header()
            {
                ?>
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Admin Dashboard - Ecommerce</title>
                    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
                    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

                    <script>

                        // products ajax
                        viewAllProducts();

                        function searchproducts() {
                            // Get value from input after DOM is loaded
                            var nameInput = document.getElementById('searchName');
                            if (!nameInput) {
                                console.error("Input with id 'searchName' not found");
                                return;
                            }

                            var name = nameInput.value.trim();
                            console.log(name);

                            if (name === "") {
                                alert("Please enter a name to search.");
                                return;
                            }

                            var ajax_request = null;

                            // Browser compatibility check
                            if (window.XMLHttpRequest) {
                                ajax_request = new XMLHttpRequest();
                            } else {
                                ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            // Set callback
                            ajax_request.onreadystatechange = function () {
                                if (ajax_request.readyState === 4) {
                                    if (ajax_request.status === 200) {
                                        document.getElementById("result").innerHTML = ajax_request.responseText;
                                    } else {
                                        document.getElementById("result").innerHTML = "Error loading data.";
                                    }
                                }
                            };

                            // Pass 'name' as query parameter
                            ajax_request.open("GET", "includes/ajax_process.php?action=searchproducts&name=" + encodeURIComponent(name), true);

                            // Send request
                            ajax_request.send();
                        }

                        function viewAllProducts() {
                            var ajax_request = null;

                            // Browser compatibility check
                            if (window.XMLHttpRequest) {
                                ajax_request = new XMLHttpRequest();
                            } else {
                                ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            // Set callback
                            ajax_request.onreadystatechange = function () {
                                if (ajax_request.readyState === 4) {
                                    if (ajax_request.status === 200) {
                                        // Show server response
                                        document.getElementById("result").innerHTML = ajax_request.responseText;
                                    } else {
                                        document.getElementById("result").innerHTML = "Error clearing data.";
                                    }
                                }
                            };

                            // Call PHP to get default data
                            ajax_request.open("GET", "includes/ajax_process.php?action=viewall", true);
                            ajax_request.send();
                        }

                        function clearall() {
                            var ajax_request = null;

                            // Browser compatibility check
                            if (window.XMLHttpRequest) {
                                ajax_request = new XMLHttpRequest();
                            } else {
                                ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            // Set callback
                            ajax_request.onreadystatechange = function () {
                                if (ajax_request.readyState === 4) {
                                    if (ajax_request.status === 200) {
                                        // Show server response
                                        document.getElementById("searchName").value = "";
                                        viewAllProducts();

                                    } else {
                                        document.getElementById("searchName").value = "";
                                    }
                                }
                            };

                            // Call PHP to get default data
                            ajax_request.open("GET", "includes/ajax_process.php?action=viewall", true);
                            ajax_request.send();
                        }

                        function editProduct(id) {
                            console.log(id);
                        }

                        function deleteProduct(id) {
                            if (id && confirm("Are you sure you want to delete this product?")) {

                                var ajax_request = null;
                                if (window.XMLHttpRequest) {
                                    ajax_request = new XMLHttpRequest();
                                } else {
                                    ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                                }

                                ajax_request.onreadystatechange = function () {
                                    if (ajax_request.readyState === 4) {
                                        if (ajax_request.status === 200) {
                                            document.getElementById("msg").innerHTML = ajax_request.responseText;
                                            viewAllProducts();
                                            // Optionally remove the deleted product card from DOM

                                        } else {
                                            document.getElementById("msg").innerHTML = "Error deleting product.";
                                        }
                                    }
                                };

                                ajax_request.open("GET", "includes/products.php?action=delete_product&id=" + id, true);
                                ajax_request.send();
                            }
                        }

                        // products ajax end 

                        // category ajax 

                        function deleteCategory(id) {
                            if (!id) {
                                alert("Invalid category ID.");
                                return;
                            }

                            if (confirm("Are you sure you want to delete this category?")) {
                                var ajax_request = null;

                                if (window.XMLHttpRequest) {
                                    ajax_request = new XMLHttpRequest();
                                } else {
                                    ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                                }

                                ajax_request.onreadystatechange = function () {
                                    if (ajax_request.readyState === 4) {
                                        if (ajax_request.status === 200) {
                                            document.getElementById("msg").innerHTML = ajax_request.responseText;
                                            // Table refresh karega
                                            viewAllCategories();
                                        } else {
                                            document.getElementById("msg").innerHTML = "Error deleting category.";
                                        }
                                    }
                                };

                                ajax_request.open("GET", "includes/products.php?action=delete_category&id=" + encodeURIComponent(id), true);
                                ajax_request.send();
                            }
                        }

                        function editCategory(id) {
                            if (!id) {
                                alert("Invalid category ID.");
                                return;
                            }

                            console.log(id);


                            var ajax_request = null;

                            if (window.XMLHttpRequest) {
                                ajax_request = new XMLHttpRequest();
                            } else {
                                ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            ajax_request.onreadystatechange = function () {
                                if (ajax_request.readyState === 4) {
                                    if (ajax_request.status === 200) {
                                        var data = JSON.parse(ajax_request.responseText);
                                        document.getElementById("edit_category_id").value = data.category_id;
                                        document.getElementById("edit_category_name").value = data.category_name;
                                    } else {
                                        document.getElementById("msg").innerHTML = "Error Editing category.";
                                    }


                                }
                            };

                            ajax_request.open("GET", "includes/products.php?action=get_category&id=" + encodeURIComponent(id), true);
                            ajax_request.send();
                        }

                        function update_category(id, category_name) {
                            // console.log(id,category_name);

                            var ajax_request = false;

                            if (window.XMLHttpRequest) {
                                ajax_request = new XMLHttpRequest();
                            } else {
                                ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                            }

                            ajax_request.onreadystatechange = function () {

                                if (ajax_request.readyState === 4) {
                                    if (ajax_request.status === 200) {
                                        document.getElementById("msg").innerHTML = ajax_request.responseText;
                                        var modal = bootstrap.Modal.getInstance(document.getElementById("editCategoryModal"));
                                        modal.hide();
                                    } else {
                                        document.getElementById("msg").innerHTML = "Error Editing category.";
                                    }


                                }
                            }

                            ajax_request.open("POST", "includes/products.php?action=update_category", true);
                            ajax_request.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                            ajax_request.send("id=" + encodeURIComponent(id) + "&category_name=" + encodeURIComponent(category_name));
                        }

                        // search by category

                        function getCategory(categoryId) {
                            if (categoryId) {

                                ajax_request = null;

                                if (window.XMLHttpRequest) {
                                    ajax_request = new XMLHttpRequest();
                                } else {
                                    ajax_request = new ActiveXObject("Microsoft.XMLHTTP");

                                }

                                ajax_request.onreadystatechange = function () {
                                    if (ajax_request.readyState === 4) {
                                        if (ajax_request.status === 200) {
                                            document.getElementById("result").innerHTML = ajax_request.responseText;
                                        } else {
                                            document.getElementById("result").innerHTML = "Error loading data.";
                                        }
                                    }
                                };

                                ajax_request.open("GET", "includes/ajax_process.php?action=searchByCategory&categoryId=" + encodeURIComponent(categoryId), true);
                                ajax_request.send();
                            }
                        }


                        // Users ajax

                        function setActive(id) {
                            if (confirm("Do you want to activate this user?")) {
                                ajax_request = null;
                                if (window.XMLHttpRequest) {
                                    ajax_request = new XMLHttpRequest();
                                } else {
                                    ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                                }

                                ajax_request.onreadystatechange = function () {
                                    if (ajax_request.readyState === 4) {
                                        if (ajax_request.status === 200) {
                                            document.getElementById("usersTable").innerHTML = ajax_request.responseText;
                                        } else {
                                            document.getElementById("usersTable").innerHTML = "Error loading data.";
                                        }
                                    }
                                };

                                ajax_request.open("GET", "includes/ajax_process.php?action=setActive&id=" + encodeURIComponent(id), true);
                                ajax_request.send();
                            }
                        }
                        function setInactive(id) {
                            if (confirm("Do you want to deactivate this user?")) {
                                ajax_request = null;
                                if (window.XMLHttpRequest) {
                                    ajax_request = new XMLHttpRequest();
                                } else {
                                    ajax_request = new ActiveXObject("Microsoft.XMLHTTP");
                                }
                                ajax_request.onreadystatechange = function () {
                                    if (ajax_request.readyState === 4) {
                                        if (ajax_request.status === 200) {
                                            document.getElementById("usersTable").innerHTML = ajax_request.responseText;
                                        } else {
                                            document.getElementById("usersTable").innerHTML = "Error loading data.";
                                        }
                                    }
                                };
                                ajax_request.open("GET", "includes/ajax_process.php?action=setInactive&id=" + encodeURIComponent(id), true);
                                ajax_request.send();
                            }
                        }

                        function searchByCategory(status) {
                            // console.log(status);
                            var ajax_request = null;

                            if (window.XMLHttpRequest) {
                                ajax_request = new XMLHttpRequest();
                            } else {
                                ajax_request = new ActiveXObject("Microsoft.XMLHTTP");

                            }

                            ajax_request.onreadystatechange = function () {
                                if (ajax_request.readyState === 4) {
                                    if (ajax_request.status === 200) {
                                        document.getElementById("usersTable").innerHTML = ajax_request.responseText;
                                    } else {
                                        document.getElementById("usersTable").innerHTML = "Error loading data.";
                                    }
                                }
                            };
                            ajax_request.open("GET", "includes/ajax_process.php?action=searchuserByCategory&status=" + encodeURIComponent(status), true);
                            ajax_request.send();
                        }



                    </script>






                    <?php
            }


            public static function side_bar()
            {
                ?>
                    <nav class="col-md-2 d-none d-md-block bg-dark text-light min-vh-100 p-3 sidebar-sticky">
                        <h4 class="mb-4">Admin Panel</h4>
                        <div class="nav flex-column">
                            <a class="nav-link text-light" href="dashboard.php">📊 Dashboard</a>
                            <a class="nav-link text-light" href="products.php">🛍 Products</a>
                            <a class="nav-link text-light" href="orders.php">📦 Orders</a>
                            <a class="nav-link text-light" href="users.php">👥 Users</a>
                            <a class="nav-link text-light" href="category.php">📂 Categories</a>
                            <a class="nav-link text-light" href="settings.php">⚙ Settings</a>
                            <a class="nav-link text-light" href="../index.php">
                                <i class="bi bi-house-door-fill"></i> Go to Home
                            </a>
                            <a class="nav-link text-danger" href="../auth/logout.php">🚪 Logout</a>
                        </div>
                    </nav>

                    <style>
                        .sidebar-sticky {
                            position: sticky;
                            top: 0;
                            height: 100vh;
                            /* Full height */
                            overflow-y: auto;
                            /* Scroll if content overflows */
                        }
                    </style>



                    <?php
            }


            public static function footer()
            {
                ?>
                    <!-- Scripts -->
                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
                    <script>
                        AOS.init({
                            duration: 1000,
                            once: true
                        });
                    </script>

                    </body>

                </html>



                <?php
            }

            public static function nav_bar()
            {
                ?>
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                    <div class="container-fluid">
                        <a class="navbar-brand fw-bold" href="#">Admin Dashboard</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>
                </nav>



                <?php
            }
        }

    }
    // Normal User
    elseif ((int) $_SESSION['user']['role_id'] === 2) {
        header("Location: ../user/dashboard.php");
        exit();
    }
    // Any other role
    else {
        header("Location: ../index.php");
        exit();
    }
} else {
    // Not logged in
    header("Location: ../index.php");
    exit();
}

?>