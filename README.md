Хостинг файлов.
Возможность:
- загружать - http://task/start
- просматривать картинки в превью и оригинале http://task/viewing
- скачивать картинки в zip ахиве
- удалять картинки
API:
- получение всех данных о картинках (имя, дата загрузки) -  http://task/get
- получение данных об отдельной картинке - http://task/get/id

Для запуска проекта, выполните команды:
- git clone https://github.com/Dmitriy-gitt/image_hosting.git
- Создайте базу данных task
- выполните миграции php artisan migrate
- запустите сервер php artisan serve
