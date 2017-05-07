<tr>
    <td><?php echo $product['productID']?></td>
    <td><?php echo $product['productName'];?></td>
    <td><?php echo $product['productDescription'];?></td>
    <td>R$ <?php echo $product['productCost'];?>.00</td>
    <td><?php echo $product['productQuantity'];?></td>
    <td><?php echo $supplierName;?></td>
    <td class="table-action-button"> <button type="button" id="<?php echo $product['productID'];?>" class="btn btn-warning btn-xs edit">Editar</button> </td>
    <td class="table-action-button"> <button type="button" id="<?php echo $product['productID'];?>" class="btn btn-danger btn-xs delete">Apagar</button> </td>
</tr>