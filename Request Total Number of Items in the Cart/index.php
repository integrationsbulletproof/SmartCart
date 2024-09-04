<?php
// replace the next line with the Cart Link provided in the Smart Cart Checkout Features
// The link can be used via Javascript or redirect on any server language (this example is based on PHP but you can use Python, Node, C# or your preferred programming language)
// where UNIQUE_ID is the public merchant unique identifier 
// In this example the add to cart link is received via URL, you can copy the link from the Smart Cart Product List
// All the Smart Cart features will require cookies enabled in the customer browser.
$add_to_cart_link = urldecode($_GET['url']);
?>
<html>

<head>
    <title>Smart Cart Integration Example</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>
    <button id="btn_view_cart" onclick="get_cart_content('<?php echo $add_to_cart_link; ?>'); return false;">Get Cart Number of Items</button>
    <br>
    <br>
    <div id='cart_content' name='cart_content' style='color:green;'>

    </div>
</body>
<script>
    function get_cart_content(url) {
        // Initialize the destination area
        jQuery('#cart_content').html("");
        // get the URL via Jquery
        jQuery.when(
            jQuery.getJSON(url)
        ).done(function(jsonReply) {
            if (jsonReply != undefined) {
                console.log(jsonReply); // Full json object

                jQuery('#cart_content').html(jsonReply);
            } else {
                console.log("No response from the Gateway Server");
            }
        });


    }
</script>

</html>