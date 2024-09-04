<!--   
// replace the next line with the Cart Link provided in the Smart Cart General Features
// The link can be used via Javascript or redirect on any server language (this example is based on PHP but you can use Python, Node, C# or your preferred programming language)
// Cart link template will be: https://bulletproof-checkout.com/portal/display_cart.php?id=UNIQUE_ID
// where UNIQUE_ID is the public merchant unique identifier 
// In this example the id is received via URL
// All the Smart Cart features will require cookies enabled in the customer browser.
-->
<?php
$cart_link = "https://bulletproof-checkout.com/portal/display_cart.php?id=" . $_GET['id'];
?>
<html>

<head>
    <title>Smart Cart Integration Example</title>
</head>

<body>
    <button id="btn_add" onclick="window.location.href='<?php echo $cart_link; ?>';">Go to cart</button>
</body>

</html>