<!-- Modal -->
<div id="create-edit-modal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="create-edit-modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <div id="alert-modal" class="hide">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <span id="alert-modal-content"></span>
                        </div>
                    </div>


                    <form id="create-edit-form" data-toggle="validator" role="form">

                    <?php include_once $class."/crudModal.php" ?>

                    </form>
                </div>

            </div>
            <div class="modal-footer">
                <input type="hidden" name="itemID" id="itemID" />

                <button id="action" type="submit" class="btn btn-primary" value=""></button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
            </div>
        </div>

    </div>
</div>