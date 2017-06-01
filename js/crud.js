$(document).ready(function() {


    function fetchData() {
        var action = "select"; // Identifica qual tipo de chamada está sendo requisita
        $.ajax({
            url: "src/<?php echo $class;?>/action.php", // Requisita a página "../action.php"
            method: "POST", // Utiliza o método $_POST para invocar a página
            data: {action: action},
            success: function (data) {
                $('#data-results').html(data); // Identifica aonde os dados serão exibidos
            }
        });
    }


});