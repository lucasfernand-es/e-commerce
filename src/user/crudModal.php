<div class="col-md-12">
    <div class="form-group">
        <label for="clientName" class="control-label">Nome:</label>
        <input type="text" class="form-control"
               data-error="Informe um nome válido."
               id="clientName" name="clientName" placeholder="Nome do Cliente"
               required>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="clientEmail" class="control-label">E-mail:</label>
        <input type="email" class="form-control"
               data-error="Informe um e-mail válido."
               id="clientEmail" name="clientEmail" placeholder="email@email.com"
               required>
        <div class="help-block with-errors"></div>
    </div>
</div>

<div class="col-md-6">
    <div class="form-group">
        <label for="clientPhone" class="control-label">Telefone:</label>
        <input type="text" class="form-control"
               data-error="Informe um telefone válido."
               pattern="^[0-9]{1,}$" maxlength="20" minlength="10"
               id="clientPhone" name="clientPhone" placeholder="(XX) X XXXX-XXXX">
        <div class="help-block with-errors"></div>
    </div>
</div>


<div class="col-md-12">

   <div class="row form-group">
       <div class="col-md-6">
           <label for="clientPassword" class="control-label">Senha:</label>
           <input type="password" data-minlength="8" class="form-control" id="clientPassword" placeholder="Senha" required>
           <div class="help-block">Mínimo de 8 caracteres.</div>
       </div>

       <div class="col-md-6">
           <label for="clientConfirmPassword" class="control-label">Confirma Senha:</label>
           <input type="password" class="form-control" id="clientConfirmPassword" data-match="#clientPassword"  data-minlength="8"
                  data-match-error="As senhas são diferentes." data-error="Este campo deve ser igual a senha."
                  placeholder="Confirme a senha" required>
           <div class="help-block with-errors"></div>
       </div>
   </div>
</div>



