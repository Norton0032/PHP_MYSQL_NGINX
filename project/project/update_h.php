<?php
$id = $_GET['id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://api_server:80/api/humans/read_one.php?id=$id");
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, 1);
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #1e1e1e;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }
        a {
            color: #4CAF50;
            text-decoration: none;
            padding: 5px;
            display: inline-block;
        }

        .btn {
            padding: 5px 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }

        form {
            margin-top: 20px;
            background-color: #2a2a2a;
            padding: 15px;
        }

        label, input {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="vendor/human/update.php" method="post">
        <h2>Обновить информацию о человеке</h2>
        <input type="hidden" name="id" value="<?php echo $id?>">
        <label for="name">Ввод имени:</label>
        <input type="text" id="name" name="name" value="<?php echo $data['name']?>">
        <br>
        <label for="surname">Ввод фамилии:</label>
        <input type="text" id="surname" name="surname"  value="<?php echo $data['surname']?>">
        <br>
        <button class="btn">Обновить</button>
    </form>
</body>
</html>