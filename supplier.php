<?php
    $title = "Fornecedores";
    $singularTitle = "Fornecedor";
    $class = "supplier";
    include_once "include/header.php";
?>


<div class="content" ng-app="eCommerce" ng-controller="SupplierController">

    <div class="row">
        <h1><?php echo $title;?></h1>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div id="alert" class="hide">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <span id="alert-content"></span>
            </div>
        </div>



        <div class="col-md-12 add-new-button">
             <button id="create"
                     type="button" class="btn btn-primary" >Adicionar Novo <?php echo $singularTitle;?></button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 ">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome do Fornecedor</th>
                    <th>Email do Fornecedor</th>
                    <th colspan="2" class="table-action-button">Ações</th>
                </tr>
                </thead>
                <tbody id="data-results" >
                </tbody>
            </table>
        </div>
    </div>

</div>



<?php include_once "include/footer.php"; ?>
<?php include_once "src/crudModal.php"; ?>
<?php include_once "src/deleteModal.php"; ?>