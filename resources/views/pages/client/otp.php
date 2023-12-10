<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OTP Verification Form</title>
    <link rel="stylesheet" href="<?= APP_URL ?>public/css/otp.css" />
    <!-- Boxicons CSS -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />
    <script src="<?= APP_URL ?>public/js/otp.js" defer></script>
</head>

<body>
    <div class="container">
        <header>
            <i class="bx bxs-check-shield"></i>
        </header>
        <h4>Enter OTP Code</h4>
        <form action="<?= APP_URL ?>checkotp" method="post">
            <div class="input-field">
                <input name="otp[]" type="number" />
                <input name="otp[]" type="number" disabled />
                <input name="otp[]" type="number" disabled />
                <input name="otp[]" type="number" disabled />
            </div>
            <button type="submit">Verify OTP</button>
        </form>
    </div>
</body>

</html>