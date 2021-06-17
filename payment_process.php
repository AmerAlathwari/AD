<?php 
//check whether stripe token is not empty
if(!empty($_POST['stripeToken'])){
    //get token, card and user info from the form
    $token  = $_POST['stripeToken'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $card_num = $_POST['card_num'];
    $card_cvc = $_POST['cvc'];
    $card_exp_month = $_POST['exp_month'];
    $card_exp_year = $_POST['exp_year'];
    
    //include Stripe PHP library
    require_once('stripe-php/init.php');
    
    //set api key
    $stripe = array(
      "secret_key"      => "sk_test_51IzEVUAiAd3ZERxxQ8G2cDGA5SDcHEJTUekLhfE9sMUNoSNPPnwVwCheU3ggVSHeGePLvXUQWFB1i4IfXFhwMa2T00hHPExmr6",
      "publishable_key" => "pk_test_51IzEVUAiAd3ZERxxkJIsEOeDR0R1gg9UfMcjlCRQaba0Dy8I5bXKhELHKNUWVnCCeozPA6DBULQS5dDVa8tl4qfh00eW2mignX"
    );
    
    \Stripe\Stripe::setApiKey($stripe['secret_key']);
    
    //add customer to stripe
    $customer = \Stripe\Customer::create(array(
        'email' => $email,
        'source'  => $token
    ));
    
    //item information
    $itemName = "Grape";
    $itemNumber = "12";
    $itemPrice = 9.0;
    $currency = "RM";
    $orderID = "GRP92715125139";
    
    //charge a credit or a debit card
    $charge = \Stripe\Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $itemPrice,
        'currency' => $currency,
        'description' => $itemName,
        'metadata' => array(
        'order_id' => $orderID
        )
    ));
    
    //retrieve charge details
    $chargeJson = $charge->jsonSerialize();

    //check whether the charge is successful
    if($chargeJson['amount_refunded'] == 0 && empty($chargeJson
['failure_code']) && $chargeJson['paid'] == 1 && $chargeJson['captured'] == 1){
        //order details 
        $amount = $chargeJson['amount'];
        $balance_transaction = $chargeJson['balance_transaction'];
        $currency = $chargeJson['currency'];
        $status = $chargeJson['status'];
        $date = date("Y-m-d H:i:s");
        
        //include database config file
        include_once 'dbConfig.php';
        
        //insert tansaction data into the database
        $sql = 
            "INSERT INTO orders(name,email,card_num,card_cvc,card_exp_month,card_exp_year,
            item_name,item_number,item_price,item_price_currency,paid_amount,
            paid_amount_currency,txn_id,payment_status,created,modified) VALUES
            ('".$name."','".$email."','".$card_num."','".$card_cvc."','".$card_exp_month."',
            '".$card_exp_year."','".$itemName."','".$itemNumber."','".$itemPrice."','".$currency."',
            '".$amount."','".$currency."','".$balance_transaction."'
            ,'".$status."','".$date."','".$date."')";
        $insert = $db->query($sql);
        $last_insert_id = $db->insert_id;
        
        //if order inserted successfully
        if($last_insert_id && $status == 'succeeded'){
            $statusMsg = "<h2>The transaction was successful.</h2>
        
        <h4>Order ID: {$last_insert_id}</h4>";
        }else{
            $statusMsg = "Transaction has been failed";
        }
    }else{
        $statusMsg = "Transaction has been failed";
    }
}else{
    $statusMsg = "Form submission error.......";
}

//show success or error message
echo $statusMsg;
?>