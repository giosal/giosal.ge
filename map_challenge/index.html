<html>
<head>
    <title>Weather snippet</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<div style="margin-bottom: 2%;">Please input the coordintes in the following format: x.y degrees, example: 44.06</div>
<form action="/" id="coordinatesForm">
    <label for="latitude">Latitude</label>
    <input id="latitude" type="text">
    <label for="longitude">Longitude</label>
    <input id="longitude" type="text">
    <button type="submit" value="Submit">Submit</button>
</form>

<div id="weather">
    <table id="weatherTable">
        <tr>
            <td>Location:</td>
            <td id="name"></td>
        </tr>
        <tr>
            <td>Country:</td>
            <td id="country"></td>
        </tr>
        <tr>
            <td>Weather:</td>
            <td id="shortWeather"></td>
        </tr>
        <tr>
            <td>Detailed weather description:</td>
            <td id="detailedWeather"></td>
        </tr>
        <tr>
            <td>Temperature:</td>
            <td id="temp"></td>
        </tr>
        <tr>
            <td>Feels like:</td>
            <td id="feelsLike"></td>
        </tr>
        <tr>
            <td>Humidity:</td>
            <td id="humidity"></td>
        </tr>
        <tr>
            <td>Pressure:</td>
            <td id="pressure"></td>
        </tr>
        <tr>
            <td>Wind speed:</td>
            <td id="windSpeed"></td>
        </tr>
        <tr>
            <td>Wind gusts:</td>
            <td id="windGusts"></td>
        </tr>
        <tr>
            <td>Wind direction:</td>
            <td id="windDirection"></td>
        </tr>
    </table>
</div>

<script>
    $("#coordinatesForm").submit(function(e) {

        e.preventDefault(); // avoid to execute the actual submit of the form.

        var form = $(this);
        $.ajax({
            type: "POST",
            dataType: 'json',
            data: {
                "lat": $("#latitude").val(),
                "long": $("#longitude").val()
            },
            url: "get_data.php",
            success: function (data) {
                console.log(data);
                $("#name").html(data["name"]);
                $("#country").html(data["sys"]["country"]);
                $("#shortWeather").html(data["weather"][0]["main"]);
                $("#detailedWeather").html(data["weather"][0]["description"]);
                $("#temp").html(data["main"]["temp"] + " &deg;C");
                $("#feelsLike").html(data["main"]["feels_like"] + " &deg;C");
                $("#humidity").html(data["main"]["humidity"] + " %");
                $("#pressure").html(data["main"]["pressure"] + " mbar");
                $("#windSpeed").html(data["wind"]["speed"] + " m/s");
                $("#windGusts").html(data["wind"]["gust"] + " m/s");
                $("#windDirection").html(data["wind"]["deg"] + " &deg;");
            }
        })
    })
</script>

</body>
</html>