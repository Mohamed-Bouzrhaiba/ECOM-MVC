<?php ?>
<div class="container">
    <table class="table">
    <thead>
        <tr>
        <th scope="col">name</th>
        <th scope="col">price</th>
        <th scope="col">qte</th>
        <th scope="col">Total</th>
        <th scope="col">cancel</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
            <?php foreach($_SESSION as $name => $product) :?> 
            <?php if(substr($name,0,9) == "products_"):?> 
            <tr>
                <td><?php echo $product["name"]  ?></td>
                <td><?php echo $product["price"]."$"  ?></td>
                <td><?php echo $product["qte"] ?></td>
                <td><?php echo $product["total"] ."$" ?></td>
                <td>
            <form method="POST" action="<?=BASE_URL?>cancelCart">
            <input type="hidden" name="product_id" value="<?=$product['id'];?>">
            <input type="hidden" name="product_price" value="<?=$product['price'];?>">
            <input type="hidden" name="qte" value="<?=$product['qte'];?>">
            <button type="submit">
                &times;
            </button>
            </form>
                </td>
            </tr>
            <?php endif;?> 
            <?php endforeach;?> 
    </tbody>
    <tfoot>
        <td colspan="4">total</td>
           <td>  <strong id="amount" data-amount="<?=$_SESSION['totals'];?>">
        <?php echo isset($_SESSION['totals'])?$_SESSION['totals']:00 ?>$
           </strong></td>      
        </tfoot>
    </table>


    <?php if(isset($_SESSION['count']) && $_SESSION['count'] >0): ?>
      <?php if (isset($_SESSION["logged"]) && $_SESSION["logged"] === true): ?>

    <form method="POST" action="<?=BASE_URL?>emptyCart">
          
            <button type="submit" class="btn btn-primary">
              EMPTY CART
            </button>
            </form>
            <div id="paypal-button-container"></div>
    <form method="POST" id="addOrder" action="<?=BASE_URL?>addOrder"></form>
    <?php else: ?>
      <p>Please <a href="<?=BASE_URL?>login">LOG IN</a> to proceed with the payment.  </p>
      <?php endif;?>
    <?php endif;?>
  
</div>

<script>
    

let amount = parseFloat(document.querySelector('#amount').dataset.amount);


paypal.Buttons({
  createOrder: function(data, actions) {
    return actions.order.create({
      purchase_units: [{
        amount: {
          value: amount.toString()
        }
      }]
    });
  },
  onApprove: function(data, actions) {
    return actions.order.capture().then(function(details) {
      alert('Commande effectuée par ' + details.payer.name.given_name);
      document.querySelector('#addOrder').submit();
    });
  }
}).render('#paypal-button-container');
console.log(amount);


</script>