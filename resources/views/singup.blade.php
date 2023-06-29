<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="https://www.google.com/imgres?imgurl=https%3A%2F%2Ficon-library.com%2Fimages%2Fmedical-app-icon%2Fmedical-app-icon-2.jpg&tbnid=7ZtaOF7CNGjcCM&vet=12ahUKEwjpuszyz-j_AhUnkicCHY3hBRUQMygJegUIARDvAQ..i&imgrefurl=https%3A%2F%2Ficon-library.com%2Ficon%2Fmedical-app-icon-1.html&docid=37jQkMiBGwjdoM&w=512&h=512&q=medical%20app%20favicon&ved=2ahUKEwjpuszyz-j_AhUnkicCHY3hBRUQMygJegUIARDvAQ" type="image/x-icon">

</head>

<body>
    <div class="container">

        <form id="form-register">

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" id="username" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="mobileNo" class="form-label">Mobile No:</label>
                <input type="text" id="mobileNo" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" id="password" class="form-control" required>
            </div>
            <div>
                <button onclick="registerUser()" class="btn btn-success">Register</button>
            </div>
        </form>

    </div>
    <script src="js/index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script>
        function registerUser() {
            console.log("clicked button")

            var username = document.getElementById("username").value;
            var mobileNo = document.getElementById("mobileNo").value;
            var password = document.getElementById("password").value;




            $(document).ready(function() {

                var form = '#form-register';

                $(form).on('submit', function(event) {
                    event.preventDefault();

                    var url = $(this).attr('data-action');

                    $.ajax({
                        url: url,
                        method: 'POST',
                        data: new FormData(this),
                        dataType: 'JSON',
                        contentType: false,
                        cache: false,
                        processData: false,
                        success: function(response) {
                            $(form).trigger("reset");
                            alert(response.success)
                        },
                        error: function(response) {}
                    });
                });

            });



        }
    </script>
</body>

</html>