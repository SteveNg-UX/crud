FROM mariadb

COPY . .
RUN mariadb < db.sql && mariadb < employees.sql
