
<?php
/*
- ===================================
Created:     Fri Apr 12 15:17:36 2019
Author:      saviokay
Description: The project revolves around retrieving policy holder and vehicle information through Phone Number.
             DB referenced here are : OPS$OPUS.VW_NS_POLICY_INFO & OPS$OPUS.VW_NS_POLICY_VEH_INFO.
Note       : Phone Number Is Passed As A PHP Argument During Code Execution. '$phone = $argv[1]'.
- ===================================
*/


//Declaring Credentials For Database Connection.
error_reporting(0);
// Identifying Database Instance Through SID.
$sid="MESDEV"; 
$username="ops\$mipsweb";
$password="m!p5W3bDE4";
//Accessing Phone Number Through PHP Command Passed Argument Array Elements '$argv[]'.
$phone = $argv[1]; 

//Establishing Database Connection Through OCI_Connect Function.
$connection = oci_connect($username, $password, $sid);
//Error Handling For Incorrect Authentication.
if (!$connection) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}
else{
//Upon Successful Connection Providing Phone Number For Second Verification.

//Executing SQL Select Command To Retrieve Policy Information With Regard $phone == null) $phone == null) $phone == null) $phone == null) $phone == null)s To Policy Holder.
$stid = oci_parse($connection, 'SELECT * FROM OPS$OPUS.VW_NS_POLICY_INFO WHERE PHONE=(:phone)');
oci_bind_by_name($stid, ':phone', $phone, -1);
oci_execute($stid);

$rows = array();
 while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $rows[] = $row;}

if(json_encode($rows) == [] || $phone == null) {
	if($phone == null){
		echo "\n";
		echo "\n";
		echo "ERROR#31:Invalid Input.";
		echo "\n";
		echo "Please Make Sure You Have The Correct Phone # Input With No Included Special Characters.";
		echo "\n";
		echo "Expected Phone # Input Format:1234567890";
		echo "\n";
		echo "Kindly Avoid Attaching Country Code To The Input.";
		echo "\n";			
	}
	else{
    echo "No Entries Found";
    echo "\n";
	echo "\n";
	echo "\n";
    exit;}
}
else{
 //Upon Successful Connection Providing Phone Number For Second Verification.
 //Decalring An Empty Array To Hold The Results For The SQL Execution.
 echo "\n";
 echo "\n";
 echo "Information For Policy#ID With Phone Number: ".$phone;
 echo "\n";
 echo "\n";
 //Encoding Results In JSON With JSON_Encode Function With JSON_PRETTY_PRINT As The Argument.
 echo json_encode($rows,JSON_PRETTY_PRINT);
 $id = $rows[0]["POLICYNUMBER"] ; 
 //Error Handling For Incorrect Authentication/Entries.
if (!$id) {
	echo "\n";
    #echo "No Entries Found For Phone Number: ".$phone;
	$myObj->Message = "No Result Found";
	echo json_encode($myObj,JSON_PRETTY_PRINT);
    echo "\n";
	echo "\n";
    exit;}
else{
 //Upon Successful Connection Providing Phone Number For Second Verification.
 
 
 //Executing SQL Select Command To Retrieve Policy Information With Regards To Policy Holder Vehicle.
 $stid2 = oci_parse($connection, 'SELECT * FROM OPS$OPUS.VW_NS_POLICY_VEH_INFO WHERE POLICY_ID=(:id)');
 oci_bind_by_name($stid2, ':id', $id, -1);
 oci_execute($stid2);

 //Decalring An Empty Array To Hold The Results For The SQL Execution.
 $rows1 = array();
 while ($row = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $rows1[] = $row;}
 echo "\n";
 echo json_encode($rows1,JSON_PRETTY_PRINT);
 echo "\n";
 echo "\n";
}
}
echo "\n";
}
?>
