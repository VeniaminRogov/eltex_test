## Стек технологий

mysql 8
php 8.1
symfony 6
docker
node

## Запуск проекта

1. **make up** запускает сборку проекта
2. После сборки проекта **make sh**
3. В контейнере в консоли **php bin/console d:d:c** создаем базу данных
4. **php bin/console d:m:m** применить миграцию
5. (Опционально) Загрузить фейковые данные **php bin/console doctrine:fixtures:load --append**
6. Переходим по **localhost:8000/orders**
