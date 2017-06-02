<tr>
    <td><?php echo $row->id; ?></td>
    <td><?php echo $row->name; ?></td>
    <td><?php echo $row->description;?></td>
    <td>R$ <?php echo $row->cost;?>.00</td>
    <td><?php echo $row->quantity;?></td>
    <td><?php $supplier = $row->supplier; print_r($supplier[0]->name);?></td>
    <?php if ($admin): ?>

    <td class="table-action-button"> <button type="button" id="<?php echo $row->id;?>" class="btn btn-warning btn-xs edit">Editar</button> </td>
    <td class="table-action-button"> <button type="button" id="<?php echo $row->id;?>" class="btn btn-danger btn-xs delete">Apagar</button> </td>

    <?php endif;?>
</tr>