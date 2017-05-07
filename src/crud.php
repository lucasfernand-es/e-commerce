<script>


    <?php
        // Como o objetivo é deixar o mais genérico possível, esta função identifica os componentes do formulário para cada classe
        switch ($class) {
            case "supplier":
                $formVariables =
                    "var supplierName = $(\"#supplierName\").val();
                    var supplierEmail = $(\"#supplierEmail\").val();";
                $formData = "supplierName:supplierName, supplierEmail:supplierEmail, ";
                $formClear = "clearSupplierForm();";
                $setformData =
                    "$(\"#supplierName\").val(data.supplierName);
                    $(\"#supplierEmail\").val(data.supplierEmail);";
                break;
            case "user":
                $formVariables =
                    "var clientName = $(\"#clientName\").val();
                    var clientEmail = $(\"#clientEmail\").val();
                    var clientPhone = $(\"#clientPhone\").val();
                    var clientPassword = $(\"#clientPassword\").val();";
                $formData = "clientName:clientName, clientEmail:clientEmail, clientPhone:clientPhone, clientPassword:clientPassword,";
                $formClear = "clearClientForm();";
                $setformData =
                    "$(\"#clientName\").val(data.clientName);
                    $(\"#clientEmail\").val(data.clientEmail);
                    $(\"#clientPhone\").val(data.clientPhone);
                    $(\"#clientPassword\").prop('disabled', true);
                    $(\"#clientConfirmPassword\").prop('disabled', true);
                    $(\"#clientPassword\").removeAttr('required');
                    $(\"#clientPassword\").removeAttr('data-minlength');
                    $(\"#clientConfirmPassword\").removeAttr('required');
                    $(\"#clientConfirmPassword\").removeAttr('data-minlength');";
                $formAdd =
                    "$(\"#clientPassword\").attr('required');
                    $(\"#clientPassword\").attr('data-minlength', 8);
                    $(\"#clientPassword\").prop('disabled', false);
                    $(\"#clientConfirmPassword\").attr('required');
                    $(\"#clientConfirmPassword\").attr('data-minlength', 8);
                    $(\"#clientConfirmPassword\").prop('disabled', false);";
                break;
            case "product":
                $formVariables =
                    "var productName = $(\"#productName\").val();
                    var productDescription = $(\"#productDescription\").val();
                    var productCost = $(\"#productCost\").val();
                    var productQuantity = $(\"#productQuantity\").val();
                    var productSupplier = $(\"#productSupplier\").find('option:selected').attr('id');";
                $formData = "productName:productName, productDescription:productDescription, productCost:productCost, productQuantity:productQuantity, productSupplier:productSupplier, ";
                $formClear = "clearProductForm();";
                $setformData =
                    "$(\"#productName\").val(data.productName);
                    $(\"#productDescription\").val(data.productDescription);
                    $(\"#productCost\").val(data.productCost);
                    $(\"#productQuantity\").val(data.productQuantity);
                    $('#productSupplier').val(data.productSupplier);";
                $methodCalls = 'loadSuppliers();';
                break;

        }
    ?>

    $(document).ready(function() {



        fetchData(); // Função para carregar os dados na tela
        // Buscar
        function fetchData() {
            var action = "loadAll"; // Identifica qual tipo de chamada está sendo requisita
            $.ajax({
                url: "src/<?php echo $class;?>/action.php", // Requisita a página "../action.php"
                method: "POST", // Utiliza o método $_POST para invocar a página
                data: {action: action},
                success: function (data) {
                    $('#data-results').html(data); // Identifica aonde os dados serão exibidos
                }
            });
        }

        <?php echo $methodCalls;?>

        // Carregar Select de Fornecedores
        function loadSuppliers() {
            var action = "loadSuppliers";
            $.ajax({
                url: "src/supplier/action.php", // Requisita a página "../action.php"
                method: "POST", // Utiliza o método $_POST para invocar a página
                data: {action: action},
                dataType:"json",
                success: function (data) {
                    var items = "";

                    $.each(data, function(index,item)
                    {
                        items += "<option id='"+ item.supplierID+"' value='"+ item.supplierID+"'>"+ item.supplierName +"</option>";
                    });

                    $("#productSupplier").html(items);

                }
            });
        }

        // Criar
        $('#create').click(function(){
            $("#alert-modal").addClass("hide");
            $('#create-edit-modal').modal('show'); // Carrega a modal
            <?php echo $formAdd;?>
            <?php echo $formClear;?>
            $('.create-edit-modal-title').text("Adicionar Novo <?php echo $singularTitle; ?>"); //Define um título para a modal
            $('#action').val('add');
            $('#action').html('Adicionar');
        });

        // Alterar e Selecionar do banco
        $(document).on('click', '.edit', function(){
            $("#alert-modal").addClass("hide");

            var itemID = $(this).attr("id");
            var action = "loadOne";
            $.ajax({
                url:  "src/<?php echo $class;?>/action.php",
                method:"POST",
                data:{itemID:itemID, action:action},
                dataType:"json",
                success:function(data){


                    $('#create-edit-modal').modal('show'); // Carrega a modal
                    $('.create-edit-modal-title').text("Editar <?php echo $singularTitle; ?>"); //Define um título para a modal
                    $('#action').val('edit');
                    $('#action').html('Editar');

                    $("#itemID").val(itemID);

                    <?php echo $setformData;?>

                },
                error:function (data) {
                    console.log(data);
                    showErrorAlert(data.error);
                }
            });

        });

        // Funções de alterar e criar
        $('#action').click(function(){
            <?php echo $formVariables; ?>

            var itemID = $('#itemID').val();  //Todas as classes utilizam o mesmo campo para ID
            var action = $('#action').val();  //Seleciona o tipo de ação

            var isFormValid = $("#create-edit-form").validator('validate').has('.has-error').length;


            if( !isFormValid ) {
                $.ajax({
                    url : "src/<?php echo $class;?>/action.php",    // Requisita a página ".../action.php"
                    method:"POST",  // Utiliza o método $_POST para invocar a página
                    data:{<?php echo $formData;?> itemID:itemID, action:action}, // Envia os dados para o servidor
                    success:function(data){

                        if(data == 'true') {
                            $('#create-edit-modal').modal('hide');
                            <?php echo $formClear;?>
                            fetchData();  // Carrega os dados novamente

                            var message;
                            if(action == 'add') {
                                message = 'Item inserido!';
                            }
                            else if(action == 'edit'){
                                message = 'Item alterado!';
                            }
                            showSuccessAlert(message);

                        }
                        else {
                            showModalErrorAlert(data);
                        }
                    }
                })
            }
            else {
                showModalErrorAlert('Preencha os dados corretamente.');
            }


        });

        // Apagar
        $(document).on('click', '.delete', function(){
            var itemID = $(this).attr("id"); // Captura o ID que deve ser apagado
            $("#deleteItemID").val(itemID);
            $('#delete-modal').modal('show');
        });


        $('#delete').click(function(){
            var itemID = $("#deleteItemID").val();

            var action = "delete"; //Define action variable value Delete
            $.ajax({
                url: "src/<?php echo $class;?>/action.php",
                method:"POST",
                data:{itemID:itemID, action:action},
                success:function(data)
                {
                    $('#delete-modal').modal('hide');
                    fetchData();
                    if(data == 'true') {
                        fetchData();  // Carrega os dados novamente
                        showSuccessAlert('Item apagado!');
                    }
                    else {
                        showErrorAlert(data);
                    }

                }
            })

        });

        function showSuccessAlert(message) {

            // Exibe uma mensagem de alerta com o sucesso
            $("#alert-content").html('<strong>Sucesso!</strong> ' + message);
            $("#alert").removeClass().addClass('alert alert-success alert-dismissible fade in show').slideDown;

        };

        function showErrorAlert(message) {

            // Exibe uma mensagem de alerta com o sucesso
            $("#alert-content").html('<strong>Erro!</strong> ' + message);
            $("#alert").removeClass().addClass('alert alert-danger alert-dismissible fade in show').slideDown;

        };

        function showModalErrorAlert(message) {

            $("#alert-modal-content").html('<strong>Erro!</strong> ' + message);
            $("#alert-modal").removeClass().addClass('alert alert-danger alert-dismissible fade in show').slideDown;
        };

        // Limpar o formulário de Fornecedores
        function clearSupplierForm() {
            $("#itemID").val('');
            $('#supplierName').val('');
            $('#supplierEmail').val('');
        }

        function clearClientForm() {
            $("#itemID").val('');
            $("#clientName").val('');
            $("#clientEmail").val('');
            $("#clientPhone").val('');
            $("#clientPassword").val('');
            $("#clientConfirmPassword").val('');
        }

        function clearProductForm() {
            $("#itemID").val('');
            $("#productName").val();
            $("#productDescription").val();
            $("#productCost").val();
            $("#productQuantity").val();
            $('#productSupplier>option:eq(0)').prop('selected', true);
        }

    });
</script>