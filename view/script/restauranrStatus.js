$(document).ready(
    function() {
        setInterval(function() {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "../restaurantmanager/resmsgdatabase.php", true);
            xhr.onload = function () {
                
                $('#idmsg').text(
                    this.response);
                };
                
                xhr.send();
            }, 3000);
        
    });