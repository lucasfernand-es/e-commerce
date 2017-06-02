<tr>
    <td><?php echo $row->id?></td>
    <td><?php echo $row->name?></td>
    <td><?php echo $row->email?></td>
    <td><?php echo $row->phone?></td>
    <td><?php echo $row->password?></td>
    <td class="table-action-button"> <button type="button" id="<?php echo $row->id?>" class="btn btn-warning btn-xs edit">Editar</button> </td>
    <td class="table-action-button"> <button type="button" id="<?php echo $row->id?>" class="btn btn-danger btn-xs delete">Apagar</button> </td>
</tr>