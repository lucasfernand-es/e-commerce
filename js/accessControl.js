$(document).ready(function() {

    $('#login').click(function(){

        var jsonData = {};
        var formData = $("#formLogin").serializeArray();
        $.each(formData, function() {
            if (jsonData[this.name]) {
                if (!jsonData[this.name].push) {
                    jsonData[this.name] = [jsonData[this.name]];
                }
                jsonData[this.name].push(this.value || '');
            } else {
                jsonData[this.name] = this.value || '';
            }

        });
        var action = 'login';

        $.ajax({
            url : "src/action.php",    // Requisita a página ".../action.php"
            method:"POST",  // Utiliza o método $_POST para invocar a página
            data:{data:jsonData, action:action, class:'user'}, // Envia os dados para o servidor
            success:function(data){

                if(data == true) {
                    console.log('correto');
                    setTimeout(' window.location.href = "index.php"; ', 0);
                }
                else {
                    showErrorAlert(data);
                }
        }
    });

    });

    $('#logout').click(function(){

        var action = 'logout';

        $.ajax({
            url: "src/action.php",    // Requisita a página ".../action.php"
            method: "POST",  // Utiliza o método $_POST para invocar a página
            data: {action: action, class:'user'}, // Envia os dados para o servidor
            success: function (data) {

                location.reload();

            }

        });
    });

    function showErrorAlert(message) {

        // Exibe uma mensagem de alerta com o sucesso
        $("#alert-content").html('<strong>Erro!</strong> ' + message);
        $("#alert").removeClass().addClass('alert alert-danger alert-dismissible fade in show').slideDown;

    };


});