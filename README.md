## Стек технологий

mysql 8,php 8.1, symfony 6, docker, node

## Запуск проекта

1. **make up** запускает сборку проекта
2. После сборки проекта **make sh** для перехода в консоль php контейнера
3. В контейнере в консоли **php bin/console doctrine:database:create** создаем базу данных
4. **php bin/console doctrine:migrations:migrate** применить миграцию
5. (Опционально) Загрузить фейковые данные **php bin/console doctrine:fixtures:load --append**
6. Переходим по **localhost:8000/orders**
