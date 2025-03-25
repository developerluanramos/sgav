# 🏛️ Public Sector Performance Evaluation App

This application is designed to assess the performance of public sector professionals, ensuring transparency, efficiency, and continuous improvement. It provides a comprehensive evaluation system that allows institutions to track, measure, and enhance employee performance based on objective metrics.

## 🚀 Features

- **Customizable Evaluation Criteria**: Tailor performance metrics to fit the unique needs of different public sector roles.
- **Real-Time Reporting**: Generate detailed reports and insights for better decision-making.
- **User-Friendly Interface**: Simplified and intuitive design for both administrators and employees.
- **Secure Data Management**: Ensuring confidentiality and integrity of all performance data.
- **Feedback Integration**: Facilitate two-way feedback between evaluators and professionals.


## 🎯 Purpose

This app aims to promote accountability and continuous development within the public sector by providing an efficient, transparent, and standardized method for performance evaluation.

## 🎯 Install

````bash
    cp .env.example .env
````
altere as variáveis de Banco de Dados de acordo com suas configurações locais

````bash
    DB_CONNECTION=pgsql
    DB_HOST=db_sgp
    DB_PORT=5432
    DB_DATABASE=sgp_db
    DB_USERNAME=user
    DB_PASSWORD=password
````
execução do ambiente

````bash
    docker compose up -d --build
````
acesse o container da aplicação e execute os comandos dentro

````bash
    composer install
    npm install
    php artisan migrate --seed
````

acesse o sistema em localhost:8020
