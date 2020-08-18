<?php
include'config.php';
include 'auth.php';

$consignment_id = $_POST['con_id'];

$query = "SELECT * FROM consignment_details WHERE id = '$consignment_id'";
$result = mysqli_query($con,$query);

$row = mysqli_fetch_assoc($result);

$volume = $row['volume'];
$amount = $row['revenue'];

$rate = $amount / $volume;
?>

<!DOCTYPE html>
<html>
<head>

<link rel="stylesheet" href="css/bill.css">
<link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Invoice</h2><h3 class="pull-right">Bill Id - 12345</h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Billed To:</strong><br>
    					<?php echo $row['sender_name']; ?><br>
                        <?php echo $row['sender_address']; ?><br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Shipped To:</strong><br>
                        <?php echo $row['receiver_name']; ?><br>
                        <?php echo $row['receiver_address']; ?><br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6 text-left">
    				<address>
    					<strong>Order Date:</strong><br>
    					March 7, 2014<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Order summary</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Consignment Id</strong></td>
                                    <td><strong>Truck Id</strong></td>
        							<td class="text-center"><strong>Volume (in Kg)</strong></td>
        							<td class="text-center"><strong>Rate (per Kg)</strong></td>
        							<td class="text-right"><strong>Price</strong></td>
                                </tr>
    						</thead>
    						<tbody>
    							<!-- foreach ($order->lineItems as $line) or some such thing here -->
    							<tr>
    								<td><?php echo $row['consignment_id']; ?></td>
                                    <td><?php echo $row['truck_id']; ?></td>
    								<td class="text-center"><?php echo $row['volume']; ?></td>
    								<td class="text-center"><?php echo $rate; ?></td>
    								<td class="text-right"><?php echo $row['revenue']; ?></td>
    							</tr>

    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
                                    <td class="thick-line text-center"><strong></strong></td>
    								<td class="thick-line text-center"><strong>Subtotal</strong></td>
                                    <td class="thick-line text-right"><?php echo $row['revenue']; ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>GST (18%)</strong></td>
                                    <td class="no-line text-right"><?php echo $row['revenue']*0.18; ?></td>
    							</tr>
    							<tr>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
                                    <td class="no-line"></td>
    								<td class="no-line text-center"><strong>Total Amount</strong></td>
                                    <td class="no-line text-right"><?php echo $row['revenue']+$row['revenue']*0.18; ?></td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

</head>
</html>