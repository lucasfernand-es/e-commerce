<?php
$title = "Produtos";
$singularTitle = "Produto";
$class = "product";
include_once "include/header.php";
?>

    <div class="content">

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

            <div class="col-md-10">
                <div class="form-group">
                    <input type="text" class="form-control"
                           id="searchText" name="searchText" placeholder="Qual o produto que você deseja?">
                </div>
            </div>

            <div class="col-md-2 text-center" >
                <button id="search" type="submit" class="btn btn-primary" value=""> Buscar <span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
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
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Custo</th>
                        <th>Quantidade</th>
                        <th>Fornecedor</th>
                        <?php if ($admin): ?>

                            <th colspan="2" class="table-action-button">Ações</th>

                        <?php endif;?>
                    </tr>
                    </thead>
                    <tbody id="data-results">
                    </tbody>
                </table>
            </div>
        </div>

    </div>

<?php include_once "include/footer.php"; ?>
<?php include_once "src/crudModal.php"; ?>
<?php include_once "src/deleteModal.php"; ?>