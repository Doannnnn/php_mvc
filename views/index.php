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
require_once "../controllers/PriceController.php";
require_once "../controllers/colorController.php";
require_once "../controllers/BrandController.php";
require_once "../controllers/productController.php";

session_start();

if (!isset($_SESSION['auth'])) {
    header("Location: login.php");
    exit;
}

$auth = $_SESSION['auth'];
if ($auth['role'] !== "USER") {
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
        <div class="container d-flex align-items-center border-bottom py-2 mt-2">
            <div class="d-flex align-items-center" style="min-width: 180px;"><a class="logo" href="index.php"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="me-2" height="22" width="22" xmlns="http://www.w3.org/2000/svg">
                        <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM408 168h-48v-40c0-8.837-7.163-16-16-16h-16c-8.837 0-16 7.163-16 16v40h-48c-8.837 0-16 7.163-16 16v16c0 8.837 7.163 16 16 16h48v40c0 8.837 7.163 16 16 16h16c8.837 0 16-7.163 16-16v-40h48c8.837 0 16-7.163 16-16v-16c0-8.837-7.163-16-16-16z">
                        </path>
                    </svg> Shoe Ecommerce</a></div>
            <div class="d-flex flex-grow-1 justify-content-between">
                <form class="w-50 d-flex align-items-center">
                    <input id="inputSearch" type="search" placeholder="Enter your search shoes" class="form-control form-control-sm" style="padding-right: 25px;">
                    <svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 512 512" height="15" width="15" xmlns="http://www.w3.org/2000/svg" style="color: rgba(0, 0, 0, 0.2); margin-left: -25px;">
                        <path d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z">
                        </path>
                    </svg>
                </form>
                <div class="d-flex">
                    <div><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="me-2" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M528.12 301.319l47.273-208C578.806 78.301 567.391 64 551.99 64H159.208l-9.166-44.81C147.758 8.021 137.93 0 126.529 0H24C10.745 0 0 10.745 0 24v16c0 13.255 10.745 24 24 24h69.883l70.248 343.435C147.325 417.1 136 435.222 136 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-15.674-6.447-29.835-16.824-40h209.647C430.447 426.165 424 440.326 424 456c0 30.928 25.072 56 56 56s56-25.072 56-56c0-22.172-12.888-41.332-31.579-50.405l5.517-24.276c3.413-15.018-8.002-29.319-23.403-29.319H218.117l-6.545-32h293.145c11.206 0 20.92-7.754 23.403-18.681z">
                            </path>
                        </svg></div><a href="logout.php"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 448 512" role="button" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z">
                            </path>
                        </svg></a>
                </div>
            </div>
        </div>
        <div class="container d-flex">
            <div style="min-width: 180px;">
                <div class="d-flex flex-column border-end me-1 h-100">
                    <div class="py-2 d-flex flex-column justify-content-center">
                        <h5>Category</h5>
                        <div class="form-group" id="radioCategory">
                            <div class="form-check py-1">
                                <input class="form-check-input" type="radio" name="category" id="cat_0" value="All" checked="">
                                <label for="cat_0" role="button" class="form-check-label text-decoration-underline fw-bolder">All</label>
                            </div>
                            <?php foreach ($categories as $category) { ?>
                                <div class="form-check py-1">
                                    <input class="form-check-input" type="radio" name="category" id="cat_<?php echo $category['id']; ?>" value="<?php echo $category['name']; ?>">
                                    <label for="cat_<?php echo $category['id']; ?>" role="button" class="form-check-label"><?php echo $category['name']; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="py-2 d-flex flex-column justify-content-center">
                        <h5>Price</h5>
                        <div class="form-group" id="radioPrice">
                            <div class="form-check py-1">
                                <input class="form-check-input" type="radio" name="price" id="price_0" value="0,0" checked>
                                <label role="button" for="price_0" class="form-check-label text-decoration-underline fw-bolder">All</label>
                            </div>
                            <?php foreach ($prices as $price) { ?>
                                <div class="form-check py-1">
                                    <input class="form-check-input" type="radio" name="price" id="price_<?php echo $price['id']; ?>" value="<?php echo $price['value']; ?>">
                                    <label for="price_<?php echo $price['id']; ?>" role="button" class="form-check-label"><?php echo $price['name']; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="py-2 d-flex flex-column justify-content-center">
                        <h5>Colors</h5>
                        <div class="form-group" id="radioColor">
                            <div class="form-check py-1">
                                <input class="form-check-input" type="radio" name="color" id="color_0" value="All" style="background-image: linear-gradient(to right, red, green);" checked>
                                <label role="button" for="color_0" class="form-check-label text-decoration-underline fw-bolder">All</label>
                            </div>
                            <?php foreach ($colors as $color) { ?>
                                <div class="form-check py-1">
                                    <input class="form-check-input" type="radio" name="color" id="color_<?php echo $color['id']; ?>" value="<?php echo $color['name']; ?>" style="background-color: <?php echo $color['name'] === "White" ? "" : $color['name']; ?>">
                                    <label for="color_<?php echo $color['id']; ?>" role="button" class="form-check-label"><?php echo $color['name']; ?></label>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex-grow-1">
                <div class="py-2 d-flex flex-column justify-content-center">
                    <h5>Recommended</h5>
                    <div class="form-group" id="buttonBrand">
                        <button class="btn btn-sm btn-outline-secondary me-1 active " value="All" type="button">All
                            Products</button>
                        <?php foreach ($brands as $brand) { ?>
                            <button class="btn btn-sm btn-outline-secondary me-1 " <?php echo $brand['name'] ?> type="button"><?php echo $brand['name'] ?></button>
                        <?php } ?>
                    </div>
                </div>
                <div class="py-2 d-flex flex-column justify-content-center">
                    <h5>Products</h5>
                    <div class="row">
                        <?php foreach ($products as $product) { ?>
                            <div class="col-md-3 mb-4">
                                <div class="card d-flex align-items-center pt-2">
                                    <div class="d-flex align-items-center justify-content-center" style="width: 100%; min-height: 210px;">
                                        <img src=<?php echo $product['img'] ?> class="card-image-top" alt="" style="width: 70%;">
                                    </div>
                                    <div class="card-body">
                                        <p class="fw-bolder"><?php echo $product['title'] ?></p>
                                        <div class="d-flex align-items-center mb-2">
                                            <div class="me-1"><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" color="yellow" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: yellow;">
                                                    <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" color="yellow" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: yellow;">
                                                    <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" color="yellow" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: yellow;">
                                                    <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                    </path>
                                                </svg><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" color="yellow" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg" style="color: yellow;">
                                                    <path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z">
                                                    </path>
                                                </svg></div>
                                            <div class="fs-10">(<?php echo $product['reviews']  ?> reviews)</div>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div><del class="line-through me-2"><?php echo $product['prevPrice']  ?></del><?php echo $product['newPrice']  ?>
                                            </div><svg stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 576 512" class="btn-cart" height="20" width="20" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M504.717 320H211.572l6.545 32h268.418c15.401 0 26.816 14.301 23.403 29.319l-5.517 24.276C523.112 414.668 536 433.828 536 456c0 31.202-25.519 56.444-56.824 55.994-29.823-.429-54.35-24.631-55.155-54.447-.44-16.287 6.085-31.049 16.803-41.548H231.176C241.553 426.165 248 440.326 248 456c0 31.813-26.528 57.431-58.67 55.938-28.54-1.325-51.751-24.385-53.251-52.917-1.158-22.034 10.436-41.455 28.051-51.586L93.883 64H24C10.745 64 0 53.255 0 40V24C0 10.745 10.745 0 24 0h102.529c11.401 0 21.228 8.021 23.513 19.19L159.208 64H551.99c15.401 0 26.816 14.301 23.403 29.319l-47.273 208C525.637 312.246 515.923 320 504.717 320zM403.029 192H360v-60c0-6.627-5.373-12-12-12h-24c-6.627 0-12 5.373-12 12v60h-43.029c-10.691 0-16.045 12.926-8.485 20.485l67.029 67.029c4.686 4.686 12.284 4.686 16.971 0l67.029-67.029c7.559-7.559 2.205-20.485-8.486-20.485z">
                                                </path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</body>

</html>