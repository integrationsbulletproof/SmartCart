<?php
// Replace the next line with the Cart Link provided in the Smart Cart Checkout Features
// The link can be used via Javascript or redirect on any server language (this example is based on PHP but you can use Python, Node, C# or your preferred programming language)
// where UNIQUE_ID is the public merchant unique identifier 
// In this example the add to cart link is received via URL, you can copy the link from the Smart Cart Product List
// All the Smart Cart features will require cookies enabled in the customer browser.
$add_to_cart_link = urldecode($_GET['url']);
$quantity=2;
?>
<html>

<head>
    <title>Smart Cart Integration Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <button id="btn_add" onclick="add_product_to_cart('<?php echo $add_to_cart_link; ?>&qty=<?php echo $quantity; ?>');">Add product to the cart</button>
<br>
    <button id="btn_view" onclick="window.location.href='https://bulletproof-checkout.com/portal/display_cart.php?id=<?php echo $_GET['id'];?>';">View Cart Content</button>
</body>
<script>
    function add_product_to_cart(url) {

        $.ajax({
            url: url,
            type: "POST",
            data: '',
            success: function(jsonReply) {
                alert('Product added succesfully');
            },
            complete: function() {

            }
        });
    }
</script>

</html>