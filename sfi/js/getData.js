var x = [];
var y = [];
var w = [];

function getData() {
    $.ajax({
        url : "php/readExcel.php",
        type : "POST",
        data : { action: 'getD' },
        dataType: "json",
        success : function (result) {
            var js = JSON.parse(JSON.stringify(result));
            x = js[0];
            y = js[1];
            w = js[2];
            createChart(x, y, w);
        }
    });

}