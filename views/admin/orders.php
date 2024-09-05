<?php 
if(isset($_SESSION["admin"]) && $_SESSION["admin"] == true){

$data = new orderController();
$orders = $data->getOrders();
}
?>
<div class="container">
    <h2 class="text-center my-4">Orders</h2>
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Product Name</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Done At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($orders as $order): ?>
                    <tr>
                        <td><?php echo $order['name'] ?></td>
                        <td><?php echo $order['product'] ?></td>
                        <td><?php echo $order['qty'] ?></td>
                        <td><?php echo $order['price'] ?></td>
                        <td><?php echo $order['total'] ?></td>
                        <td><?php echo $order['done_at'] ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
