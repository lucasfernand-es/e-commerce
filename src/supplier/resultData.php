<tr>
    <td><?php echo $row->supplierID?></td>
    <td><?php echo $row->supplierName?></td>
    <td><?php echo $row->supplierEmail?></td>
    <td class="table-action-button"> <button type="button" id="<?php echo $row->supplierID?>" class="btn btn-warning btn-xs edit">Editar</button> </td>
    <td class="table-action-button"> <button type="button" id="<?php echo $row->supplierID?>" class="btn btn-danger btn-xs delete">Apagar</button> </td>
</tr>