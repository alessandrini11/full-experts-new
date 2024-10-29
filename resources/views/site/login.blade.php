<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>

<body>
    <style>
    body {
        background-color: gainsboro;
    }

    .c1 {
        margin-left: auto !important;
        margin-right: auto !important;
    }

    .forme {
        background-color: white !important;
        padding: 20px !important;
        border: none;
        border-radius: 10px !important;
        width: 85% !important;
        margin-right: auto !important;
        margin-left: auto !important;
    }

    .back {
        background-color: #312F82 !important;
        color: white !important;
        padding: 13px !important;
    }

    .submit {
        background-color: #312F82 !important;
        color: white;
        width: 100% !important;
        margin-top: 7px !important;
    }

    .submit:hover {
        transition: 0.7s !important;
        margin-top: 3px !important;
        font-weight: 700 !important;
        color: white !important;
    }

    #login {
        background-color: #312F82;
        color: white;
        font-size: larger;
        font-weight: 700;
        padding: 10px;
        width: 90% !important;
        border-top-right-radius: 9px !important;
        margin-left: 10px !important;
    }
    </style>
    <div class="container-fluid c1 mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form class="forme" action="{{url('/login_valid')}}" method="POST">
                    @csrf
                    <div class="d-flex">
                        <label for=""><a href="{{url('/')}}" class="rounded-circle btn btn-custom back"><i
                                    class="fa-solid fa-arrow-left"></i></a></label>
                        <label for="#" id="login">Login as admin</label>
                    </div>
                    <p class="mt-3" style="font-size:large;">Please enter admin username and password</p>

                    <div>
                        <p>
                            <label for="#">Email</label>
                            <input type="email" placeholder="Admin email" name="email" class="form-control mt-2"
                                required>
                        </p>
                        <p>
                            <label for="#">Password</label>
                            <input type="password" placeholder="Admin password" name="password"
                                class="form-control mt-2" required>
                        </p>


                    </div>

                    <p class="mt-4"><button type="submit" class="btn btn-custom submit" name="login">Login</button></p>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>
</body>

</html>