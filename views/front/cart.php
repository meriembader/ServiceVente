<?php

if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
  
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id = ?');
    $stmt->execute([$_POST['product_id']]);
   
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($product && $quantity > 0) {
     
        if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
            if (array_key_exists($product_id, $_SESSION['cart'])) {
               
                $_SESSION['cart'][$product_id] += $quantity;
            } else {
              
                $_SESSION['cart'][$product_id] = $quantity;
            }
        } else {
           
            $_SESSION['cart'] = array($product_id => $quantity);
        }
    }
   
    header('location: index.php?page=cart');
    exit;
}

if (isset($_GET['remove']) && is_numeric($_GET['remove']) && isset($_SESSION['cart']) && isset($_SESSION['cart'][$_GET['remove']])) {

    unset($_SESSION['cart'][$_GET['remove']]);
}
if (isset($_POST['update']) && isset($_SESSION['cart'])) {

    foreach ($_POST as $k => $v) {
        if (strpos($k, 'quantity') !== false && is_numeric($v)) {
            $id = str_replace('quantity-', '', $k);
            $quantity = (int)$v;
          
            if (is_numeric($id) && isset($_SESSION['cart'][$id]) && $quantity > 0) {
             
                $_SESSION['cart'][$id] = $quantity;
            }
        }
    }
    
    header('location: index.php?page=cart');
    exit;
}


if (isset($_POST['placeorder']) && isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
    header('Location: index.php?page=placeorder');
    exit;
}

$products_in_cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();

if ($products_in_cart) {
    
    $array_to_question_marks = implode(',', array_fill(0, count($products_in_cart), '?'));
    $stmt = $pdo->prepare('SELECT * FROM products WHERE id IN (' . $array_to_question_marks . ')');
    
    $stmt->execute(array_keys($products_in_cart));
   
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($products as $product) {
        $subtotal += (float)$product['price'] * (int)$products_in_cart[$product['id']];
    }
}


// For testing purposes set this to true, if set to true it will use paypal sandbox
$testmode = true;
$paypalurl = $testmode ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
// If the user clicks the PayPal checkout button...
if (isset($_POST['paypal']) && $products_in_cart && !empty($products_in_cart)) {
    // Variables we need to pass to paypal
    // Make sure you have a business account and set the "business" variable to your paypal business account email
    $data = array(
        'cmd'			=> '_cart',
        'upload'        => '1',
        'lc'			=> 'EN',
        'business' 		=> 'payments@yourwebsite.com',
        'cancel_return'	=> 'https://yourwebsite.com/index.php?page=cart',
        'notify_url'	=> 'https://yourwebsite.com/index.php?page=cart&ipn_listener=paypal',
        'currency_code'	=> 'USD',
        'return'        => 'https://yourwebsite.com/index.php?page=placeorder'
    );
    // Add all the products that are in the shopping cart to the data array variable
    for ($i = 0; $i < count($products); $i++) {
        $data['item_number_' . ($i+1)] = $products[$i]['id'];
        $data['item_name_' . ($i+1)] = $products[$i]['name'];
        $data['quantity_' . ($i+1)] = $products_in_cart[$products[$i]['id']];
        $data['amount_' . ($i+1)] = $products[$i]['price'];
    }
    // Send the user to the paypal checkout screen
    header('location:' . $paypalurl . '?' . http_build_query($data));
    // End the script don't need to execute anything else
    exit;
}
// Below the key is the product ID and the value is the quantity
$products_in_cart = array(
	1 => 2, // Product with the ID 1 has a quantity of 2
	2 => 2
);
// Products should look like the following, you can execute a SQL query to get products from your database
$products = array(
	array(
		'id' => 1, 
		'name' => 'Smart Watch',
		'price' => 15.00
	),
	array(
		'id' => 2,
		'name' => 'Headphones',
		'price' => 10.00
	)	
);
// Below is the listener for paypal, make sure to set the IPN URL (e.g. http://example.com/cart.php?ipn_listener=paypal) in your paypal account, this will not work on a local server
    if (isset($_GET['ipn_listener']) && $_GET['ipn_listener'] == 'paypal') {
        // Get all input variables and convert them all to URL string variables
        $raw_post_data = file_get_contents('php://input');
        $raw_post_array = explode('&', $raw_post_data);
        $myPost = array();
        foreach ($raw_post_array as $keyval) {
            $keyval = explode ('=', $keyval);
            if (count($keyval) == 2) $myPost[$keyval[0]] = urldecode($keyval[1]);
        }
        $req = 'cmd=_notify-validate';
        $get_magic_quotes_exists = function_exists('get_magic_quotes_gpc') ? true : false;
        foreach ($myPost as $key => $value) {
            if ($get_magic_quotes_exists == true && get_magic_quotes_gpc() == 1) {
                $value = urlencode(stripslashes($value));
            } else {
                $value = urlencode($value);
            }
            $req .= "&$key=$value";
        }
        // Below will verify the transaction, it will make sure the input data is correct
        $ch = curl_init($paypalurl);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $req);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($ch, CURLOPT_FORBID_REUSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Connection: Close'));
        $res = curl_exec($ch);
        curl_close($ch);
        if (strcmp($res, 'VERIFIED') == 0) {
            // Transaction is verified and successful...
            $item_id = array();
            $item_quantity = array();
            $item_mc_gross = array();
            // Add all the item numbers, quantities and prices to the above array variables
            for ($i = 1; $i < ($_POST['num_cart_items']+1); $i++) {
                array_push($item_id, $_POST['item_number' . $i]);
                array_push($item_quantity, $_POST['quantity' . $i]);
                array_push($item_mc_gross, $_POST['mc_gross_' . $i]);
            }
            // Insert the transaction into our transactions table, as the payment status changes the query will execute again and update it, make sure the "txn_id" column is unique
            $stmt = $pdo->prepare('INSERT INTO transactions VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?) ON DUPLICATE KEY UPDATE payment_status = VALUES(payment_status)');
            $stmt->execute([
                NULL,
                $_POST['txn_id'],
                $_POST['mc_gross'],
                $_POST['payment_status'],
                implode(',', $item_id),
                implode(',', $item_quantity),
                implode(',', $item_mc_gross),
                date('Y-m-d H:i:s'),
                $_POST['payer_email'],
                $_POST['first_name'],
                $_POST['last_name'],
                $_POST['address_street'],
                $_POST['address_city'],
                $_POST['address_state'],
                $_POST['address_zip'],
                $_POST['address_country']
            ]);
        }
        exit;
    }
?>
<?=template_header('Cart')?>

<div class="cart content-wrapper">
    <h1>Shopping Cart</h1>
    <form action="index.php?page=cart" method="post">
        <table>
            <thead>
                <tr>
                    <td colspan="2">Product</td>
                    <td>Price</td>
                    <td>Quantity</td>
                    <td>Total</td>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                <tr>
                    <td class="img">
                        <a href="index.php?page=product&id=<?=$product['id']?>">
                            <img src="imgs/<?=$product['img']?>" width="50" height="50" alt="<?=$product['name']?>">
                        </a>
                    </td>
                    <td>
                        <a href="index.php?page=product&id=<?=$product['id']?>"><?=$product['name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['id']?>" class="remove">Remove</a>
                    </td>
                    <td class="price">&dollar;<?=$product['price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['id']?>" value="<?=$products_in_cart[$product['id']]?>" min="1" max="<?=$product['quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$product['price'] * $products_in_cart[$product['id']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <div class="subtotal">
            <span class="text">Subtotal</span>
            <span class="price">&dollar;<?=$subtotal?></span>
        </div>
        <div class="buttons">
            <input type="submit" value="Update" name="update">
            <input type="submit" value="Place Order" name="placeorder">
            <div class="paypal">
    <button type="submit" name="paypal"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></button>
</div>
        </div>
    </form>
    <form action="your php cart file" method="post">
	<div class="paypal">
		<button type="submit" name="paypal"><img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></button>
	</div>
</form>
</div>

<?=template_footer()?>
