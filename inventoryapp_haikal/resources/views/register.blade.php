<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { font-family: Arial; padding: 50px; background: #f0f0f0; }
        form { max-width: 400px; margin: auto; background: white; padding: 30px; border-radius: 10px; }
        input, textarea { width: 100%; padding: 10px; margin: 10px 0; }
        button { padding: 10px 20px; background: green; color: white; border: none; }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Form Registrasi</h1>
    <form action="/welcome" method="POST">
        @csrf
        <input type="text" name="first_name" placeholder="Nama Depan" required><br>
        <input type="text" name="last_name" placeholder="Nama Belakang" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="phone" placeholder="No Telepon"><br>
        <textarea name="address" placeholder="Alamat"></textarea><br>
        <button type="submit">Submit</button>
    </form>
</body>
</html>