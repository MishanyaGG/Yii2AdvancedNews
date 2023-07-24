# Новостной сайт на фреймвовке Yii2 Advanced
Разработчик Титов Михаил - https://t.me/MischanyaTop \

В данном проекте будет создана страница для просмотра новостей, а так же страница для администрации (регистрация включительно). Администрация сможет делать некоторые действия в системе сайта: добавление/удаление/редактирование новостей, изменение своих пользовательских данных. 

Будет использована БД - MySQL. PHP-7.4\
Помощник для построения сайта - Bootstrap-5
# Ветки
Ветка <strong> master </strong> - хранит версии, которые работают корректно\
Ветка <strong> Test </strong> - происходит процесс разработки\
Ветка <strong> TestComponents </strong> - происходит тестирование устанавливаемых компонентов
# Руководство запуска
1) Прописываем команду `php init` в каталоге проекта
2) Настройка базы данных находится в файле ``common/config/main-local.php``. Где в переменную ``dsn`` записывается ``<название языка бд>:host=<url бд>;(по необходимости)port=<порт бд>;dbname=<название бд>``\
Переменная ``username`` - название пользователя под которым будете заходить в бд\
Переменная ``password`` - пароль пользоватлея
3) Произвести миграцию с помощью команды ``php yii migrate``
4) Запуск проекта `frontend` с помощью команды ``php yii serve --docroot="frontend/web" <-p="порт по необходимости">``
5) Запуск проекта `backend` с помощью команды ``php yii serve --docroot="backend/web" <-p="порт по необходимости">``

P.S.\
Написав в frontend url `/language/result?=language=<код языка страны>` то покажется информация на данном языке (если данный язык добавлен в бд). Корректно будет рабоотать после первого запуска `backend` проекта (перейти на главную страницу) 
