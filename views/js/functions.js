function create_user(){
    $.ajax({
        type: "POST",
        url: "../controller/Controller.php",
        data: {
            "route": "create_user",
            "name": "Antoine"

        },
        datatype: "text/html",
        success: function (response) {
            var datosJSON = JSON.parse(response);
            console.log(datosJSON);
        },
        fail: function (response) {
            console.log('request failed' + response);
        }
    });    
}