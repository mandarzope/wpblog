<?php 
ob_start();
error_reporting(0);
ini_set('display_errors', 'off');
$username='testing@aipexworldwide.com'; // client username
$password='testing'; // client password
$token='DF0863B1FB'; // token number 10 digit
$from_address_id='1'; // from address id
$to_pincode = '411001'; // delivery pincode
$to_address = 'addresstest1addresstest1addresstest1'; // delivery address 1
$to_address2 = 'addresstest1addresstest1addresstest2'; // delivery address 2
$to_address3 = 'addresstest1addresstest1addresstest3'; // delivery address 3
$customer_firstname = 'MR test'; // delivery customer first name
$customer_lastname = 'test'; // delivery customer last name
$customer_email = 'test@gmail.com'; // delivery customer email id
$customer_contact_no = '1234567891'; // delivery customer contact no
$ship_date= '2016-10-29'; // ship date order date
$company_name = ''; // delivery customer company name or customer name
$insurance = 'Yes'; // Yes or No
$no_of_packages = '1';
$package_type = 'identical'; // identical or nonidentical
$package_id = 9; // as per packages api //package desctiption
$total_invoice_value = '3396'; //invoice_value
$shipping_method='air'; // air or surface
$shipping_type='nondoc'; // doc or nondoc
$payment_mode='online'; // online or cod
$package_name='standard'; // standard or priority or economy or regular
$partner_id= '19'; // partner id as per search service availalibity api ,
$package_weight1 = '0.5';
$package_height1 = '14';
$package_length1 = '10';
$package_width1 = '16';
$aipex_ref_number = 'ab123'; // alphanumeric //order reference number

$request_url ='http://aipexworldwide.com/sandbox/index.php?route=account/getapi/ordercreate';
$post_data='&aipex_ref_number='.$aipex_ref_number.'&username='.$username.'&insurance='.$insurance.'&shipping_method='.$shipping_method.'&shipping_type='.$shipping_type.'&from_address_id='.$from_address_id.'&to_pincode='.$to_pincode.'&to_address='.$to_address.'&to_address2='.$to_address2.'&to_address3='.$to_address3.'&customer_firstname='.$customer_firstname.'&customer_lastname='.$customer_lastname.'&customer_email='.$customer_email.'&customer_contact_no='.$customer_contact_no.'&company_name='.$company_name.'&ship_date='.$ship_date.'&no_of_packages='.$no_of_packages.'&package_type='.$package_type.'&package_id='.$package_id.'&total_invoice_value='.$total_invoice_value.'&pass='.$password.'&token='.$token.'&payment_mode='.$payment_mode.'&package_name='.$package_name.'&partner_id='.$partner_id.'&package_weight1='.$package_weight1.'&package_height1='.$package_height1.'&package_length1='.$package_length1.'&package_width1='.$package_width1.'';
$post = curl_init();
curl_setopt($post, CURLOPT_URL, $request_url);
curl_setopt($post, CURLOPT_POST,TRUE);
curl_setopt($post, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($post, CURLOPT_RETURNTRANSFER, TRUE);
$response = curl_exec($post);
curl_close($post);
print_r($response);
$result = json_decode($response, true);
?>
