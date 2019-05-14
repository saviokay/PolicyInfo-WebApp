
<?php
/*
- ===================================
Created:     Fri Apr 12 15:17:36 2019
Author:      saviokay
Description: The project revolves around retrieving policy holder and vehicle information through policy ID.
             DB referenced here are : OPS$OPUS.VW_NS_POLICY_INFO & OPS$OPUS.VW_NS_POLICY_VEH_INFO.
Note       : Policy ID Is Passed As A PHP Argument During Code Execution. '$id = $argv[1]'.
- ===================================
*/


error_reporting(0);
// Identifying Database Instance Through SID.
$sid="MESDEV"; 
$username="ops\$mipsweb";
$password="m!p5W3bDE4";
//Accessing Policy ID Through PHP Command Passed Argument Array Elements '$argv[]'.
$id = $argv[1]; 

//Establishing Database Connection Through OCI_Connect Function.
$connection = oci_connect($username, $password, $sid);
//Error Handling For Incorrect Authentication.
if (!$connection) {
    $m = oci_error();
    echo $m['message'], "\n";
    exit;
}
else{
 echo "\n";
//Upon Successful Connection Providing Policy#ID For Second Verification.
 echo "Information For Policy#ID: ".$id;
}


//Executing SQL Select Command To Retrieve Policy Information With Regards To Policy Holder.
$stid = oci_parse($connection, 'SELECT * FROM OPS$OPUS.VW_NS_POLICY_INFO WHERE policy_id=(:id)');
oci_bind_by_name($stid, ':id', $id, -1);
oci_execute($stid);

//Executing SQL Select Command To Retrieve Policy Information With Regards To Policy Holder Vehicle.
$stid2 = oci_parse($connection, 'select * from OPS$OPUS.VW_NS_POLICY_VEH_INFO where policy_id=(:id)');
oci_bind_by_name($stid2, ':id', $id, -1);
oci_execute($stid2);

echo "\n";
//Declaring An Empty Array To Hold The Results For The SQL Execution.
$rows = array();
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $rows[] = $row;}

echo "\n";
//Declaring An Empty Array To Hold The Results For The SQL Execution.
$rows1 = array();
while ($row = oci_fetch_array($stid2, OCI_ASSOC+OCI_RETURN_NULLS)) {
    $rows1[] = $row;}

//Encoding Results In JSON With JSON_Encode Function Including JSON_PRETTY_PRINT As The Argument.
echo json_encode($rows,JSON_PRETTY_PRINT);
echo "\n";
echo json_encode($rows1,JSON_PRETTY_PRINT);


#echo json_encode($rows1[0]["VIN"]);

/*foreach ( $obj2['vin'] as $coords => $vin )
{   
  echo $coords;
}*/

?>
