
# PHP_MYSQL_NGINX
Проект, состоящий из 4 docker-контейнеров: reverse proxy на Nginx, СУБД Mysql, REST API на чистом PHP и сервер для взаимодействия с API на чистом PHP.

## Особенности проекта
- База данных состоит из 2 таблиц: пользователи и посты
- Возможность быстро развернуть с помощию docker compose
- Reverse proxy на Nginx
- REST API

## Самостоятельная сборка и запуск
Вы можете клонировать репозиторий и в папке проекта прописать "docker compose up". Приложение будет локально развернуто и доступно по адрессу "http://localhost/project/".
## Скриншоты 
<p>
    <img src="/media/main.png" width="800" />
    <div align="center"> Внешний вид главной страницы<div>
</p>
<p>
    <img src="/media/main2.png" width="800" /> 
    <div align="center">Внешний вид главной страницы после изменений</div>
</p>
<p float="left">
    <img src="/media/person.png" width="300" />
    <img src="/media/post.png" width="300" />
    <div align="center">Внешний вид страниц с пользователем и постом</div> 
</p>
