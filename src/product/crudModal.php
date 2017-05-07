
<div class="col-md-12">
    <div class="form-group">
        <label for="productName" class="control-label">Nome:</label>
        <input type="text" class="form-control"
               data-error="Informe um nome válido."
               id="productName" name="productName" placeholder="Nome do Produto"
               required>
        <div class="help-block with-errors"></div>
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
        <label for="productDescription" class="control-label">Descrição:</label>
        <textarea class="form-control" rows="3" id="productDescription" name="productDescription" data-error="Informe uma descrição válida." placeholder="Descrição" required></textarea>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-md-12">
    <div class="row form-group">
        <div class="col-md-6">
            <label for="productCost" class="control-label">Custo:</label>
            <div class="input-group">
                <div class="input-group-addon">R$</div>
                <input type="number" class="form-control"
                       data-error="Informe um valor válido."
                       id="productCost" name="productCost" placeholder="Custo" required>
                <div class="input-group-addon">.00</div>
            </div>
            <div class="help-block with-errors"></div>
        </div>

        <div class="col-md-6">
            <label for="productQuantity" class="control-label">Quantidade:</label>
            <input type="number" class="form-control"
                   data-error="Informe um valor válido."
                   id="productQuantity" name="productQuantity" placeholder="Quantidade" required>
            <div class="help-block with-errors"></div>
        </div>
    </div>
</div>


<div class="col-md-12">
    <div class="form-group">
        <label for="productSupplier" class="control-label">Nome do Fornecedor:</label>

        <select class="form-control"
                id="productSupplier" name="productSupplier" required>
        </select>

    </div>
</div>
