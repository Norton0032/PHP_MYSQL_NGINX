<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #333; /* Цвет фона страницы */
            color: #fff; /* Цвет текста */
            font-family: Arial, sans-serif; /* Шрифт текста */
        }
        
        #info-container {
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            background-color: #222; /* Цвет фона блока информации */
            border-radius: 10px;
            text-align: center;
        }
        
        #name {
            font-size: 24px;
            margin-bottom: 10px;
        }
        
        #links {
            margin-top: 20px;
        }
        
        #links a {
            text-decoration: none;
            color: #fff; /* Цвет ссылок */
            background-color: #444; /* Цвет фона ссылок */
            padding: 5px 10px;
            margin-right: 10px;
            border-radius: 5px;
        }
    </style>
</head>
<body>
<?php
$id = $_GET['id'];
$ch = curl_init();
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, "http://api_server:80/api/posts/read_one.php?id=$id");
$response = curl_exec($ch);
curl_close($ch);
$data = json_decode($response, 1);
?>
    <div id="info-container">
        <div id="id">ID: <?php echo $id?></div>
        <div id="name">Текст: <?php echo $data['text']?></div>
        <div id="surname">Id создателя: <?php echo $data['ID_user']?></div>
        <div id="links">
            <a href="../..">Назад</a>
            <?php echo'<a href=../../update_p.php?id=' .$id. '>Обновить</a>'?>
            <?php echo'<a href=../../vendor/post/delete.php?id=' .$id. '>Удалить</a>'?>
        </div>
    </div>
</body>
</html>