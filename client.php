<!DOCTYPE html>
<html>
<head>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.js"></script>
    <style>
        .form {
            padding: 20px;
            border: 1px solid black;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="form">
        <h2>FORMULIER</h2>
        <input type="number" class="studentnmr">
        <button class="submit">Verstuur</button>
        <p>Resultaat:</p>
        <p class="result"></p>
    </div>

    <script>
        $('.submit').on('click', function(){
            var data = {"studentNR":  parseInt($('.studentnmr').val())};

            $.ajax({
                method: 'POST',
                url: 'http://markvm.nl/api/tests',
                headers: {
                    "Content-Type": ["application/json"]
                },
                data: JSON.stringify(data),
            }).done(function(result){

                if (result) {
                    $('.result').html(result.image);
                } else {
                    $('.result').html('OEPSIE er ging iets mis!!');
                }
            })
        })
    </script>
</body>
</html>