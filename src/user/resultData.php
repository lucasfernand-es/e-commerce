<tr>
    <td><?php echo $row->userID?></td>
    <td><?php echo $row->userName?></td>
    <td><?php echo $row->userEmail?></td>
    <td><?php echo $row->userPhone?></td>
    <td><?php echo $row->userPassword?></td>
    <td class="table-action-button"> <button type="button" id="<?php echo $row->userID?>" class="btn btn-warning btn-xs edit">Editar</button> </td>
    <td class="table-action-button"> <button type="button" id="<?php echo $row->userID?>" class="btn btn-danger btn-xs delete">Apagar</button> </td>
</tr>