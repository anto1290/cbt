<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Halaman Registrasi</title>
    <style>
        label{
            display:block;
        }
    </style>
</head>
<body>
    <h1>Halaman Registrasi</h1>

    <form action="<?= base_url().'register/register_aksi'; ?>" method="post">
        <ul>
            <li>
                <label for="username">Username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <button type="submit" name="register">Register !</button>
            </li>
        </ul>
    </form>
</body>
</html>