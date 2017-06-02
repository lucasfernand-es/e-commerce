<script>


    <?php
        // Como o objetivo é deixar o mais genérico possível, esta função identifica os componentes do formulário para cada classe


        $methodCalls = "";
        $formAdd="";

        switch ($class) {
            case "supplier":
                $formVariables =
                    "var supplierName = $(\"#supplierName\").val();
                    var supplierEmail = $(\"#supplierEmail\").val();";
                $formData = "object:{name:supplierName, email:supplierEmail}, ";
                $formClear = "clearSupplierForm();";
                $setformData =
                    "$(\"#supplierName\").val(data.name);
                    $(\"#supplierEmail\").val(data.email);";
                break;
            case "client":
                $formVariables =
                    "var clientName = $(\"#clientName\").val();
                    var clientEmail = $(\"#clientEmail\").val();
                    var clientPhone = $(\"#clientPhone\").val();
                    var clientPassword = $(\"#clientPassword\").val();";
                $formData = "object:{name:clientName, email:clientEmail, phone:clientPhone, password:clientPassword},";
                $formClear = "clearClientForm();";
                $setformData =
                    "$(\"#clientName\").val(data.name);
                    $(\"#clientEmail\").val(data.email);
                    $(\"#clientPhone\").val(data.phone);
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
                $formData = "object : {name:productName, description:productDescription, cost:productCost, quantity:productQuantity, idSupplier:productSupplier}, ";
                $formClear = "clearProductForm();";
                $setformData =
                    "$(\"#productName\").val(data.name);
                    $(\"#productDescription\").val(data.description);
                    $(\"#productCost\").val(data.cost);
                    $(\"#productQuantity\").val(data.quantity);
                    $('#productSupplier').val(data.idSupplier);";
                $methodCalls = 'loadSuppliers();';
                break;

        }
    ?>

    $(document).ready(function() {



        fetchData(); // Função para carregar os dados na tela
        // Buscar
        function fetchData() {
            var action = "retrieve";
            $.ajax({
                url: "src/action.php", // Requisita a página "../action.php"
                method: "POST", // Utiliza o método $_POST para invocar a página
                data: {action: action, class: "<?php echo $class;?>"},
                success: function (data) {
                    //console.log(data);
                    $('#data-results').html(data); // Identifica aonde os dados serão exibidos
                }
            });
        }

        // Carregar Select de Fornecedores
        function loadSuppliers() {
            var action = "retrieve";
            $.ajax({
                url: "src/action.php", // Requisita a página "../action.php"
                method: "POST", // Utiliza o método $_POST para invocar a página
                data: {action: action, class: "supplier", load: "true"},
                dataType:"json",
                success: function (data) {
                    //console.log(data);
                    var items = "";

                    $.each(data, function(index, item)
                    {
                        var obj = JSON.parse(item);
                        items += "<option id='"+ obj.id+"' value='"+ obj.id+"'>"+ obj.name +"</option>";
                    });

                    $("#productSupplier").html(items);

                },
                error:function (data) {
                    console.log(data);
                    showErrorAlert(data.error);
                }
            });
        }


        // Criar
        $('#search').click(function(){
            var action = "retrieve";

            var searchText = $('#searchText').val();

            console.log(searchText);

            $.ajax({
                url: "src/action.php", // Requisita a página "../action.php"
                method: "POST", // Utiliza o método $_POST para invocar a página
                data: {action: action, class: "product", object: {name: searchText}, search: true},
                success: function (data) {
                    console.log(data);
                    $('#data-results').html(data); // Identifica aonde os dados serão exibidos
                }
            });


        });

        // Criar
        $('#create').click(function(){
            $("#alert-modal").addClass("hide");
            $('#create-edit-modal').modal('show'); // Carrega a modal
            <?php if($formAdd) echo $formAdd;?>
            <?php if($formClear) echo $formClear;?>
            $('.create-edit-modal-title').text("Adicionar Novo <?php echo $singularTitle; ?>"); //Define um título para a modal
            $('#action').val('create');
            $('#action').html('Adicionar');
        });


        <?php if($methodCalls) echo $methodCalls; ;?>
        // Alterar e Selecionar do banco
        $(document).on('click', '.edit', function(){
            $("#alert-modal").addClass("hide");

            var id = $(this).attr("id");
            var action = "retrieve";
            $.ajax({
                url:  "src/action.php",
                method:"POST",
                data:{id:id, action:action, class: "<?php echo $class;?>"},
                dataType:"json",
                success:function(data){

                    //console.log(data);


                    $('#create-edit-modal').modal('show'); // Carrega a modal
                    $('.create-edit-modal-title').text("Editar <?php echo $singularTitle; ?>"); //Define um título para a modal
                    $('#action').val('update');
                    $('#action').html('Editar');

                    $("#itemID").val(id);

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
                    url : "src/action.php",    // Requisita a página ".../action.php"
                    method:"POST",  // Utiliza o método $_POST para invocar a página
                    data:{<?php echo $formData;?> id:itemID, action:action, class: "<?php echo $class;?>"}, // Envia os dados para o servidor

                    success:function(data){

                        //console.log(data);

                        if(data == 'true') {
                            $('#create-edit-modal').modal('hide');
                            <?php echo $formClear;?>
                            fetchData();  // Carrega os dados novamente

                            var message;
                            if(action == 'create') {
                                message = 'Item inserido!';
                            }
                            else if(action == 'update'){
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
            var id = $("#deleteItemID").val();

            var action = "delete"; //Define action variable value Delete
            $.ajax({
                url: "src/action.php",
                method:"POST",
                data:{id:id, action:action, class: "<?php echo $class;?>"},
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