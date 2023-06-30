
<!DOCTYPE html>
<html lang="en">
<head>

    <style>#a{background-color: rgb(16, 14, 14);}</style>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    
</head>
<body>

    <div id="a" class=" d-flex justify-content-center align-items-center vh-100">

        <form action="validate.php" method="GET" class="bg-warning p-3" >

            <div class="text-center"><h4>Login Here</h4></div>

            <input required class="form-control" type="number" placeholder="Enter OTP" name="otp">

            <div class="text-center">
                <button class="btn btn-success mt-3">Submit</button>
            </div>

        </form>

    </div>

</body>
</html>