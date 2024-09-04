<?php
// Replace the next line with the Cart Link provided in the Smart Cart General Features
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
    <button id="btn_view_cart" onclick="get_cart_content('<?php echo $add_to_cart_link; ?>'); return false;">Get Items in Cart</button>
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
                let line_cart_content = "";
                let i = 0;
                let cart_total = 0;
                // Receive all products in the cart
                while (i < jsonReply.length) {
                    //Display the items received
                    if (jsonReply[i].sku != undefined) {
                        line_cart_content += "Product SKU: " + decodeURIComponent(jsonReply[i].sku.replace(/\+/g, " ")) + "<br>";
                    }
                    if (jsonReply[i].name != undefined) {
                        line_cart_content += "Product Name: " + decodeURIComponent(jsonReply[i].name.replace(/\+/g, " ")) + "<br>";
                    }
                    if (jsonReply[i].qty != undefined) {
                        line_cart_content += "Product Quantity: " + jsonReply[i].qty + "<br>";
                    }
                    if (jsonReply[i].unit_price != undefined) {
                        line_cart_content += "Product Unit Price: " + jsonReply[i].unit_price + "<br>";
                    }
                    if (jsonReply[i].tax != undefined) {
                        line_cart_content += "Product Tax %: " + jsonReply[i].tax + "<br>";
                    }
                    if (jsonReply[i].shipping != undefined) {
                        line_cart_content += "Product Shipping: " + jsonReply[i].shipping + "<br>";
                    }
                    if (jsonReply[i].subtotal != undefined) {
                        line_cart_content += "Product Subtotal: " + jsonReply[i].subtotal + "<br>";
                    }
                    if (jsonReply[i].total_with_price_and_shipping != undefined) {
                        line_cart_content += "Product Total with Shipping and Tax: " + jsonReply[i].total_with_price_and_shipping + "<br>";
                        cart_total = cart_total + jsonReply[i].total_with_price_and_shipping;
                    }
                    
                    if (jsonReply[i].surcharge_amount != undefined) {
                        line_cart_content += "Item Technology Fee Amount: " + jsonReply[i].surcharge_amount + "<br>";
                    }
                    if (jsonReply[i].is_subscription != undefined) {
                        line_cart_content += "Product is a subscription? " + jsonReply[i].is_subscription + "<br>";
                        if (jsonReply[i].rebills != undefined) {
                            line_cart_content += "Product Number of Rebills: " + jsonReply[i].rebills + "<br>";
                        }
                        if (jsonReply[i].period != undefined) {
                            line_cart_content += "Product Subscription Period: " + jsonReply[i].period + "<br>";
                        }
                    }
                    if (jsonReply[i].note != undefined) {
                        line_cart_content += "Note about this product: " + jsonReply[i].note + "<br>";
                    }
                    line_cart_content += "<br>";
                    i++;
                }
                if (cart_total>0){
                    line_cart_content += "Cart Total Amount is:"+cart_total+"<br>";
                }
                jQuery('#cart_content').html(line_cart_content);
            } else {
                console.log("No response from the gateway server");
            }
        });


    }
</script>

</html>