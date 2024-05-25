<?php
        // Initialize the session
        session_start();
        
        // Check if the user is logged in, if not then redirect him to login page
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
            header("location: ../index.php");
            exit;
        }
        ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products List</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<style>
   body {
    font-family: 'Poppins', sans-serif;
    background-color: #f8f9fa;
    margin: 0;
    padding: 0;
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-image: linear-gradient(to bottom, #0f0f0f 590px, #000000 50px);
    color: #000000;
    padding: 20px;
}
.btn {
    font-weight: bold;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.container {
    margin-top: 20px; /* Adjust the margin as needed */
}

/* Navbar Styles */
.navbar {
    background-color: #343a40;
}
.cart:hover {
    background-color: #e6b800;
}
.cart {
    background-color: #ffcc00;
    color: #333;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}
.slideshow-container {
    border: 3px solid orange; 
    border-radius: 10px;
    max-width: 1300px;
    width: 100%;
    height: 200px;
    position: relative;
    margin: auto;
    overflow: hidden;
    box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5);
  }

  .slideshow-container img {
    width: 100%; /* Set images to fill container width */
    height: 100%; /* Set images to fill container height */
    display: block;
    object-fit: cover; /* Ensure images cover entire container */
  }
.navbar-brand, .navbar-nav .nav-link {
    color: #ffffff;
}

.navbar-brand img {
    margin-right: 5px;
}

/* Products Display Styles */
#productsDisplay {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px;
    padding: 20px;
}

.card {
    border: 7px solid orange;
    border-radius: 5px;
    padding: 20px;
    margin: 10px;
    width: 285px;
    background-color: black;
    box-shadow: 0 0 20px orange;
    display: flex;
    flex-direction: column;
    align-items: center;
    transition: transform 0.3s, box-shadow 0.3s;
}

.card:hover {
    transform: scale(1.1); 
    box-shadow: 0 0 20px orange;
}

.card-img-top {
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
    height: 200px;
    object-fit: cover;
}

.card-body {
    padding: 20px;
}

.card-title {
    margin-bottom: 10px;
    margin-top: 10px;
    color: orange;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 40px;
    text-align: center;
}

.card-img {
    width: 100%;
    max-width: 150px; /* Set maximum width for the image */
    height: auto;
    border-radius: 5px;
  }
.card-text {
    margin-top: 10px;
    color: orange;
    text-align: center;
}

.btn-add-to-cart {
    background-color: black;
    color: #fff;
    border: none;
    border-radius: 5px;
    padding: 8px 12px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-add-to-cart:hover {
    background-color: #218838;
}

/* Cart Container Styles */
#cartContainer {
    position: fixed;
    top: 4em;
    right: 20px;
    background-color: #fff;
    border: 1px solid #ddd;
    padding: 10px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
    z-index: 999;
    border-radius: 5px;
    max-width: 300px;
}
.pull-left {
    float: left !important;
}
.pull-right {
    float: right !important;
}

/* Modal Styles */
.modal-content {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.modal-header {
    background-color: #343a40;
    color: #fff;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}

.modal-title {
    color: #fff;
}

.modal-body, .modal-footer {
    padding: 20px;
}
.logo-container {
    flex: 1;
}

.logo img {
    max-width: 100px; /* Set a maximum width */
    height: auto; /* To maintain aspect ratio */
}

.nav-links {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.nav-links li {
    margin-right: 20px;
}

.nav-links li a {
    text-decoration: none;
    color: #fff;
    font-weight: bold;
    font-size: 18px; /* Increased font size */
    transition: color 0.3s ease, box-shadow 0.3s ease; /* Added box-shadow transition */
    box-shadow: 20px 10px 30px rgba(255, 165, 0, 0); /* Initial box-shadow */
    border-radius: 15px;
}

.nav-links li a:hover {
    color: #ffcc00;
    box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5); /* Box-shadow on hover */
}
nav {
    flex: 6;
    background-color: black;
    padding: 10px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    box-shadow: 0px 2px 5px orange(0, 0, 0, 0.1);
     border: 6px solid orange; 
    border-radius: 10px;
}
.modal-footer {
    border-top: none;
    background-color: #f8f9fa;
}
.mt-5 {
    margin-top: 50px !important;
}
.mb-3 {
    margin-bottom: 30px !important;
}
h1 {
    color: orange;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 60px;
    text-align: center; /* Center-align the text */
}
.slideshow-container {
    border: 3px solid orange; 
    border-radius: 10px;
    max-width: 1300px;
    width: 100%;
    height: 200px;
    position: relative;
    margin: auto;
    overflow: hidden;
    box-shadow: 0px 0px 40px rgba(255, 204, 0, 0.5);
  }

  .slideshow-container img {
    width: 100%; /* Set images to fill container width */
    height: 100%; /* Set images to fill container height */
    display: block;
    object-fit: cover; /* Ensure images cover entire container */
  }

  /* Fading animation */
  .fade {
    animation-name: fade;
    animation-duration: 1.5s;
  }

  @keyframes fade {
    0% {opacity: 1}
    50% {opacity: 0.4}
    100% {opacity: 1}
  }
  
  .slides {
    position: absolute;
    width: 100%;
    height: 100%;
    opacity: 0;
    transition: opacity 1.5s ease; /* Fade transition duration */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3); /* Shadow border */
  }

  .slides.active {
    opacity: 1;
  }

  .slides.next {
    opacity: 1;
  }
  .navigation {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    width: 100%;
    display: flex;
    justify-content: space-between;
    padding: 0 20px;
    box-sizing: border-box;
  }
  
  .navigation button {
    background-color: transparent; /* Transparent background */
    border: 5px solid #ffa500; /* 5px border with color orange */
    border-radius: 20px; /* Rounded corners */
    padding: 10px 20px;
    cursor: pointer;
    transition: box-shadow 0.3s ease; /* Smooth transition for box-shadow */
    font-weight: bold; /* Bold text */
    color: #ffa500; /* Orange text color */
  }
  
  .navigation button:hover {
    box-shadow: 0 0 10px rgba(255, 165, 0, 0.7); /* Shadow effect on hover */
  }
  
.btn-group {
    display: flex;
    justify-content: center;
    margin-top: 10px;
}

.btn {
    padding: 5px 10px;
    width: 120px; 
    border: 2px solid orange; 
    border-radius: 5px;
    cursor: pointer;
    margin: 0 5px;
    background-color: black;
    color: orange;
    transition: background-color 0.3s, color 0.3s;
    margin-top: 3%;
}

.btn:hover {
    background-color: orange;
    color: black; /* Change text color on hover */
    box-shadow: 0 0 10px orange;
}
.wrapper {
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

</style>
<body> 
    <nav>
        <div class="logo-container">
            <img src="../media/logoone.jpg" alt="Logo" style="max-width: 150px; margin-top: -10px;">
        </div>
                <ul class="nav-links">
                    <li><a href="../backups/logistic.php">logistics</a></li>
                    <li><a href="report.html">Report</a></li>
                </ul>
        <div style="text-align: center;">
            <a href="../public/user/reset.php" class="btn btn-warning" style="border-color: black;">Reset Password</a>
            <a href="../public/user/logout.php" class="btn btn-danger mr-3" style="border-color: black;">Log-out</a>
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartModal">
            View Cart
        </button>
        </div>
</nav>
            </nav>
            <hr>
            <div class="slideshow-container">
        <img class="slides fade" src="../media/luffy-ace-sabo.webp" alt="Image 1">
        <img class="slides fade" src="../media/luffy.jpg" alt="Image 2">
        <img class="slides fade" src="../media/nami-roben.webp" alt="Image 3">
        <img class="slides fade" src="../media/pirate.jpg" alt="Image 4">
        <img class="slides fade" src="../media/roben.jpg" alt="Image 5">
        <div class="navigation">
            <button onclick="prevSlide()">Prev</button>
            <button onclick="nextSlide()">Next</button>
        </div>
        </div>

        <h1 class="my-5" style="font-size: 30px;">Welcome!, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b> Discover quality products at great prices. Start shopping now!</h1>

            <h1 class="text" style="color: orange; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 60px; text-align: center;">PRODUCTS</h1>
            <hr>
            <hr style="border-top: 3px solid orange;">
        <hr>

        <div class="product-box">
        <div id="productsDisplay" class="card-grid"></div>
        
    </div>
    
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">List poducts in cart</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="cartModalBody">
  

                <div class="container">
        <div id="productsDisplay" class="row"></div>
    </div>



                </div>
                <div class="modal-footer">
                    <p class="mr-auto" id="totalPrice"></p>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="buyButton">Buy</button>
                </div>
            </div>
        </div>
    </div>
    <hr>
            <hr style="border-top: 3px solid orange;">
        <hr>

        <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="productModalLabel">Product Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" id="productModalBody">
                    <!-- Product details will be dynamically inserted here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="proceedBuyButton">Proceed to Buy</button>
                </div>
            </div>
        </div>
    </div>


    <script>
        fetch('products-api.php')
    .then(response => response.json())
    .then(data => {
        const productsContainer = document.getElementById('productsDisplay');
        data.forEach(product => {
            const cardHTML = `
                <div class="card">
                    <img class="card-img-top" src="${product.img}" alt="${product.title}">
                    <div class="card-body">
                        <h5 class="card-title">${product.title}</h5>
                        <p class="card-text">${product.description}</p>
                        <p class="card-text">Price: ₱${product.rrp}</p>
                        <p class="card-text">Quantity: ${product.quantity}</p>
                        <button  type="button" class="btn btn-primary" data-toggle="modal" data-target="#cartModal"onclick="buyProduct(${product.id}, '${product.title}', ${product.rrp})">
                                    <i class="fas fa-shopping-cart"></i> Buy
                                </button>
                        <button class="btn btn-add-to-cart" onclick="addToCart(${product.id}, '${product.title}', ${product.rrp})">
                            <i class="fas fa-cart-plus"></i> Add to Cart
                        </button>
                          
                                
                    </div>
                </div>
            `;
            productsContainer.innerHTML += cardHTML;
        });
    })
    .catch(error => console.error('Error:', error));
 
    function buyProduct(productId, productName, productPrice) {
            // Here you can add logic to handle the purchase of the product
            console.log(`Buying product: ${product.title} - ₱${productPrice}`);
            alert('Buying product!');
        }



        function showProductDetails(productId, productName, productDescription, productPrice, productImg) {
            const productModalBody = document.getElementById('productModalBody');
            const modalContent = `
                <div class="row">
                    <div class="col-md-6">
                        <img src="${productImg}" class="img-fluid" alt="${productName}">
                    </div>
                    <div class="col-md-6">
                        <h2>${productName}</h2>
                        <p>${productDescription}</p>
                        <p>Price: ₱${productPrice}</p>
                    </div>
                </div>
            `;
            productModalBody.innerHTML = modalContent;
            $('#productModal').modal('show'); // Show the modal
        }

        // Function to handle the "Proceed to Buy" button click
        document.getElementById('proceedBuyButton').addEventListener('click', () => {
            // Add logic here to proceed with the purchase
            alert('Proceeding with the purchase...');
            // Redirect to the checkout page or perform other actions
        });


        let cart = {};

        function buyProduct(productId, productName, productPrice) {
            if (cart[productId]) {
                cart[productId].quantity++;
            } else {
                cart[productId] = { name: productName, quantity: 1, price: productPrice };
            }
            displayCart();
        }

        function removeFromCart(productId) {
            if (cart[productId]) {
                cart[productId].quantity--;
                if (cart[productId].quantity <= 0) {
                    delete cart[productId];
                }
            }
            displayCart();
        }

        function deleteFromCart(productId) {
            delete cart[productId];
            displayCart();
        }

        function displayCart() {
            const cartModalBody = document.getElementById('cartModalBody');
            const totalPriceElement = document.getElementById('totalPrice');
            let cartHTML = '';
            let totalPrice = 0;

            for (const [productId, product] of Object.entries(cart)) {
                const productTotal = product.quantity * product.price;
                totalPrice += productTotal;
                cartHTML += `
                    <div>
                    
                        <p>Product Name: ${product.name}, Quantity: ${product.quantity}, Total: ₱${productTotal}</p>
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${productId})">-</button>
                        <button class="btn btn-secondary btn-sm" onclick="deleteFromCart(${productId})">Remove</button>
                    </div>
                `;
            }

            cartModalBody.innerHTML = cartHTML;
            totalPriceElement.innerHTML = `Total Price: ₱${totalPrice}`;
        }

        document.getElementById('buyButton').addEventListener('click', () => {
            window.location.href = '../backups/user.php';
        });

        function addToCart(productId, productName, productPrice) {
            if (cart[productId]) {
                cart[productId].quantity++;
            } else {
                cart[productId] = { name: productName, quantity: 1, price: productPrice };
            }
            displayCart();
        }

        function removeFromCart(productId) {
            if (cart[productId]) {
                cart[productId].quantity--;
                if (cart[productId].quantity <= 0) {
                    delete cart[productId];
                }
            }
            displayCart();
        }

        function deleteFromCart(productId) {
            delete cart[productId];
            displayCart();
        }

        function displayCart() {
            const cartModalBody = document.getElementById('cartModalBody');
            const totalPriceElement = document.getElementById('totalPrice');
            let cartHTML = '';
            let totalPrice = 0;

            for (const [productId, product] of Object.entries(cart)) {
                const productTotal = product.quantity * product.price;
                totalPrice += productTotal;
                cartHTML += `
                    <div>
                        <p>Product Name: ${product.name}, Quantity: ${product.quantity}, Total: ₱${productTotal}</p>
                        <button class="btn btn-danger btn-sm" onclick="removeFromCart(${productId})">-</button>
                        <button class="btn btn-secondary btn-sm" onclick="deleteFromCart(${productId})">Remove</button>
                    </div>
                `;
            }

            cartModalBody.innerHTML = cartHTML;
            totalPriceElement.innerHTML = `Total Price: ₱${totalPrice}`;
        }

        document.getElementById('buyButton').addEventListener('click', () => {
            window.location.href = '../backups/user.php';
        });


     

     


    </script>
    <script src="../javascript/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
