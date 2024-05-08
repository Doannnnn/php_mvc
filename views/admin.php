<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Ecommerce</title>
    <link rel="stylesheet" href="../views/assets/index.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<?php

require_once "../controllers/CategoryController.php";
require_once "../controllers/BrandController.php";
require_once "../controllers/ColorController.php";
require_once "../controllers/PriceController.php";
require_once "../controllers/ProductController.php";

session_start();

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit;
} else

    $auth = $_SESSION['auth'];
if ($auth['role'] !== "ADMIN") {
    header("Location: login.php");
    exit;
}

$categoryController = new CategoryController();
$priceController = new PriceController();
$colorController = new ColorController();
$brandController = new BrandController();
$productController = new ProductController();

$categories = $categoryController->handleCategoryRequest();
$prices = $priceController->handlePriceRequest();
$colors = $colorController->handleColorRequest();
$brands = $brandController->handleBrandRequest();
$products = $productController->handleProductRequest();

?>

<body>
    <div id="root">
        <div class="container">
            <div class="d-flex align-items-center justify-content-between py-3 border-bottom">
                <div class="d-flex align-items-center" style="min-width: 180px;">
                    <a class="logo" href="#">
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="me-2" height="22" width="22" xmlns="http://www.w3.org/2000/svg">
                            <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z">
                            </path>
                        </svg> Dashoard
                    </a>
                </div>
                <div>
                    <a href="logout.php">ADMIN
                        <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 256 256" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                            <path d="M112,216a8,8,0,0,1-8,8H48a16,16,0,0,1-16-16V48A16,16,0,0,1,48,32h56a8,8,0,0,1,0,16H48V208h56A8,8,0,0,1,112,216Zm109.66-93.66-40-40a8,8,0,0,0-11.32,11.32L196.69,120H104a8,8,0,0,0,0,16h92.69l-26.35,26.34a8,8,0,0,0,11.32,11.32l40-40A8,8,0,0,0,221.66,122.34Z">
                            </path>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="d-flex py-2">
                <div style="min-width: 180px;">
                    <div class="">
                        <h5>Menu</h5>
                        <div class="d-flex flex-column">
                            <a aria-current="page" class="menu d-flex align-items-center active" href="#">
                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 640 512" class="me-2" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M128 352H32c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zm-24-80h192v48h48v-48h192v48h48v-57.59c0-21.17-17.23-38.41-38.41-38.41H344v-64h40c17.67 0 32-14.33 32-32V32c0-17.67-14.33-32-32-32H256c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h40v64H94.41C73.23 224 56 241.23 56 262.41V320h48v-48zm264 80h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32zm240 0h-96c-17.67 0-32 14.33-32 32v96c0 17.67 14.33 32 32 32h96c17.67 0 32-14.33 32-32v-96c0-17.67-14.33-32-32-32z">
                                    </path>
                                </svg> Products
                            </a>
                        </div>
                    </div>
                </div>
                <div class="flex-grow-1">
                    <div class="container">
                        <div class="modal fade" style="display: none;">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <form>
                                        <div class="modal-header">
                                            <h5 class="modal-title">Add New Product</h5>
                                            <button type="button" class="btn-close" id="btn-close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <label class="form-label">Title</label>
                                                        <input type="text" class="form-control form-control-sm " placeholder="Title" name="title">
                                                        <span class="invalid-feedback"></span>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label class="form-label">NewPrice</label>
                                                        <input type="number" class="form-control form-control-sm " placeholder="NewPrice" name="newPrice">
                                                        <span class="invalid-feedback"></span>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label class="form-label">PrevPrice</label>
                                                        <input type="number" class="form-control form-control-sm " placeholder="PrevPrice" name="prevPrice">
                                                        <span class="invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group mb-2">
                                                        <label class="form-label">Category</label>
                                                        <select class="form-select form-select-sm " name="category">
                                                            <option value="" disabled="" selected="">Please select category</option>
                                                            <?php foreach ($categories as $category) { ?>
                                                                <option value=<?php echo $category["name"] ?>><?php echo $category["name"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="invalid-feedback"></span>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label class="form-label">Brand</label>
                                                        <select class="form-select form-select-sm " name="company">
                                                            <option value="" disabled="" selected="">Please select company</option>
                                                            <?php foreach ($brands as $brand) { ?>
                                                                <option value=<?php echo $brand["name"] ?>><?php echo $brand["name"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="invalid-feedback"></span>
                                                    </div>
                                                    <div class="form-group mb-2">
                                                        <label class="form-label">Color</label>
                                                        <select class="form-select form-select-sm " name="color">
                                                            <option value="" disabled="" selected="">Please select color</option>
                                                            <?php foreach ($colors as $color) { ?>
                                                                <option value=<?php echo $color["name"] ?>><?php echo $color["name"] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <span class="invalid-feedback"></span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="border-dashed d-flex flex-column align-items-center justify-content-between w-100 h-100">
                                                        <img alt="" style="max-width: 90%; max-height: 70%;">
                                                        <div class="d-flex align-items-center justify-content-between">
                                                            <button type="button" class="btn btn-sm btn-secondary">
                                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="me-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                                    <path d="M0 168v-16c0-13.255 10.745-24 24-24h360V80c0-21.367 25.899-32.042 40.971-16.971l80 80c9.372 9.373 9.372 24.569 0 33.941l-80 80C409.956 271.982 384 261.456 384 240v-48H24c-13.255 0-24-10.745-24-24zm488 152H128v-48c0-21.314-25.862-32.08-40.971-16.971l-80 80c-9.372 9.373-9.372 24.569 0 33.941l80 80C102.057 463.997 128 453.437 128 432v-48h360c13.255 0 24-10.745 24-24v-16c0-13.255-10.745-24-24-24z">
                                                                    </path>
                                                                </svg>Change
                                                            </button>
                                                        </div>
                                                        <input id="file-change-photo" type="file" accept="image/*" class="d-none">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-dark d-flex align-items-center" id="btn-cancle">
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" class="me-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M212.333 224.333H12c-6.627 0-12-5.373-12-12V12C0 5.373 5.373 0 12 0h48c6.627 0 12 5.373 12 12v78.112C117.773 39.279 184.26 7.47 258.175 8.007c136.906.994 246.448 111.623 246.157 248.532C504.041 393.258 393.12 504 256.333 504c-64.089 0-122.496-24.313-166.51-64.215-5.099-4.622-5.334-12.554-.467-17.42l33.967-33.967c4.474-4.474 11.662-4.717 16.401-.525C170.76 415.336 211.58 432 256.333 432c97.268 0 176-78.716 176-176 0-97.267-78.716-176-176-176-58.496 0-110.28 28.476-142.274 72.333h98.274c6.627 0 12 5.373 12 12v48c0 6.627-5.373 12-12 12z">
                                                    </path>
                                                </svg>Cancel
                                            </button>
                                            <button type="submit" class="btn btn-success d-flex align-items-center">
                                                <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="me-2" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M433.941 129.941l-83.882-83.882A48 48 0 0 0 316.118 32H48C21.49 32 0 53.49 0 80v352c0 26.51 21.49 48 48 48h352c26.51 0 48-21.49 48-48V163.882a48 48 0 0 0-14.059-33.941zM224 416c-35.346 0-64-28.654-64-64 0-35.346 28.654-64 64-64s64 28.654 64 64c0 35.346-28.654 64-64 64zm96-304.52V212c0 6.627-5.373 12-12 12H76c-6.627 0-12-5.373-12-12V108c0-6.627 5.373-12 12-12h228.52c3.183 0 6.235 1.264 8.485 3.515l3.48 3.48A11.996 11.996 0 0 1 320 111.48z">
                                                    </path>
                                                </svg>Save
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row product-title">
                            <div class="col-lg-12 d-flex align-items-center justify-content-between">
                                <h5>Product List Management</h5>
                                <button class="btn btn-warning btn-sm d-flex align-items-center" id="btn-add">
                                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="me-2" height="15" width="15" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M416 208H272V64c0-17.67-14.33-32-32-32h-32c-17.67 0-32 14.33-32 32v144H32c-17.67 0-32 14.33-32 32v32c0 17.67 14.33 32 32 32h144v144c0 17.67 14.33 32 32 32h32c17.67 0 32-14.33 32-32V304h144c17.67 0 32-14.33 32-32v-32c0-17.67-14.33-32-32-32z"></path>
                                    </svg>Add New Product
                                </button>
                            </div>
                        </div>
                        <div class="row product-list">
                            <div class="col-md-12 d-flex align-items-center my-2"></div>
                            <table class="table table-striped product-table">
                                <thead>
                                    <tr>
                                        <th class="text-center">Title</th>
                                        <th class="text-start">Color</th>
                                        <th class="text-start">Category</th>
                                        <th class="text-start">Brand</th>
                                        <th class="text-end">PrevPrice</th>
                                        <th class="text-end">NewPrice</th>
                                        <th class="text-center">Rate</th>
                                        <th class="text-center">Reviews</th>
                                        <th class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($products as $product) { ?>
                                        <tr>
                                            <td class="text-start align-middle" style="min-width: 250px;">
                                                <div class="d-flex align-items-center">
                                                    <img src=<?php echo $product["img"] ?> alt="" style="width: 50px;">
                                                    <span class="ms-2"><?php echo $product["title"] ?></span>
                                                </div>
                                            </td>
                                            <td class="text-start align-middle">
                                                <span class="badge px-2 py-1 border text-black" style="background-color:<?php echo $product["color"] ?>; color: <?php echo $product["color"] === "White" ? "Black" : "White" ?>"><?php echo $product["color"] ?></span>
                                            </td>
                                            <td class="text-start align-middle">
                                                <?php echo $product["category"] ?>
                                            </td>
                                            <td class="text-start align-middle">
                                                <?php echo $product["brand"] ?>
                                            </td>
                                            <td class="text-end align-middle">
                                                <del class="me-3">$<?php echo $product["prevPrice"] ?></del>
                                            </td>
                                            <td class="text-end align-middle">
                                                <span class="me-3">$<?php echo $product["newPrice"] ?></span>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex flex-column align-items-center justify-content-center">
                                                    <div class="d-flex align-items-center"><span class="me-1"><?php echo $product["star"] ?></span><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" color="yellow" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: yellow;">
                                                            <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                            </path>
                                                        </svg></div>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex flex-column align-items-center justify-content-center">
                                                    <div><span class="me-1"><?php echo $product["reviews"] ?></span><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" color="green" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: green;">
                                                            <path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                                                            </path>
                                                        </svg></div>
                                                </div>
                                            </td>
                                            <td class="text-center align-middle">
                                                <div class="d-flex align-items-center justify-content-center"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="text-success me-1" role="button" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M402.6 83.2l90.2 90.2c3.8 3.8 3.8 10 0 13.8L274.4 405.6l-92.8 10.3c-12.4 1.4-22.9-9.1-21.5-21.5l10.3-92.8L388.8 83.2c3.8-3.8 10-3.8 13.8 0zm162-22.9l-48.8-48.8c-15.2-15.2-39.9-15.2-55.2 0l-35.4 35.4c-3.8 3.8-3.8 10 0 13.8l90.2 90.2c3.8 3.8 10 3.8 13.8 0l35.4-35.4c15.2-15.3 15.2-40 0-55.2zM384 346.2V448H64V128h229.8c3.2 0 6.2-1.3 8.5-3.5l40-40c7.6-7.6 2.2-20.5-8.5-20.5H48C21.5 64 0 85.5 0 112v352c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48V306.2c0-10.7-12.9-16-20.5-8.5l-40 40c-2.2 2.3-3.5 5.3-3.5 8.5z">
                                                        </path>
                                                    </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" class="text-danger" role="button" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M432 32H312l-9.4-18.7A24 24 0 0 0 281.1 0H166.8a23.72 23.72 0 0 0-21.4 13.3L136 32H16A16 16 0 0 0 0 48v32a16 16 0 0 0 16 16h416a16 16 0 0 0 16-16V48a16 16 0 0 0-16-16zM53.2 467a48 48 0 0 0 47.9 45h245.8a48 48 0 0 0 47.9-45L416 128H32z">
                                                        </path>
                                                    </svg></div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var modal = document.querySelector(".modal");
            var btnAdd = document.getElementById("btn-add");
            var btnClose = document.getElementById("btn-close");
            var btnCancle = document.getElementById("btn-cancle");

            // Khi nút "Thêm sản phẩm mới" được nhấp vào
            btnAdd.addEventListener("click", function() {
                modal.classList.add("show");
                modal.style.display = "block";
            });

            // Đóng modal khi click x 
            btnClose.addEventListener("click", function() {
                modal.classList.remove("show");
                modal.style.display = "none";
            });

            // Đóng modal khi click cancle
            btnCancle.addEventListener("click", function() {
                modal.classList.remove("show");
                modal.style.display = "none";
            });

            // Đóng modal khi nhấp chuột bên ngoài modal
            window.addEventListener("click", function(event) {
                if (event.target === modal) {
                    modal.classList.remove("show");
                    modal.style.display = "none";
                }
            });
        });
    </script>

</body>

</html>