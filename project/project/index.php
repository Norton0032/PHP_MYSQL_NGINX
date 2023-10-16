<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #1e1e1e;
            color: #e0e0e0;
            font-family: Arial, sans-serif;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #3d3d3d;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #2a2a2a;
        }

        th {
            background-color: #4CAF50;
            color: white;
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
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Имя</th>
                <th>Фамилия</th>
                <th>Просмотр</th>
                <th>&#9998</th>
                <th>&#10006</th>
            </tr>
        </thead>
        <tbody>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://api_server:80/api/humans/read.php");
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, 1);
if (!isset($data["message"])){
foreach($data as $value){
    echo "<tr><td>{$value['ID']}</td><td>{$value['name']}</td><td>{$value['surname']}</td><td><a href='vendor/human/read.php?id={$value["ID"]}'}'>Просмотр</a></td><td><a href='update_h.php?id={$value['ID']}'>Обновить</a></td><td><a href='vendor/human/delete.php?id={$value['ID']}'>Удалить</a></td></tr>";
}
}
?>
        </tbody>
    </table>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Текст поста</th>
                <th>Id создателя</th>
                <th>Просмотр</th>
                <th>&#9998</th>
                <th>&#10006</th>
            </tr>
        </thead>
        <tbody>
<?php
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://api_server:80/api/posts/read.php");
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, 1);
if (!isset($data["message"])){
foreach($data as $value){
    echo "<tr><td>{$value['ID']}</td><td>{$value['text']}</td><td>{$value['ID_user']}</td><td><a href='vendor/post/read.php?id={$value["ID"]}'}>Просмотр</a></td><td><a href='update_p.php?id={$value['ID']}'}>Обновить</a></td><td><a href='vendor/post/delete.php?id={$value['ID']}'>Удалить</a></td></tr>";
}
}
?>
        </tbody>
    </table>

    <form action="vendor/human/create.php" method="post">
        <h2>Добавить нового человека</h2>
        <label for="name">Ввод имени:</label>
        <input type="text" id="name" name="name">
        <br>
        <label for="surname">Ввод фамилии:</label>
        <input type="text" id="surname" name="surname">
        <br>
        <button class="btn">Создать</button>
    </form>
    <form action="vendor/post/create.php" method="post">
        <h2>Добавить новый пост</h2>
        <label for="text">Введите текст поста:</label>
        <input type="text" id="text" name="text">
        <br>
        <label for="ID_user">Ввод Id создателя:</label>
        <input type="text" id="ID_user" name="ID_user">
        <br>
        <button class="btn">Создать</button>
    </form>
</body>
</html>