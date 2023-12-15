# Swoole Training

Welcome to the SwooleTraining repository! This repository contains a mini system designed to practice and explore the features of Swoole in PHP.

## Prerequisites

Make sure you have the following installed on your machine before proceeding:

- [Docker](https://www.docker.com/)
- [Docker Compose](https://docs.docker.com/compose/)

## Getting Started

### 1. Clone the Repository:

```bash
git clone https://github.com/your-username/SwooleTraining.git
```

### 2. Navigate to the Project Directory:

```bash
cd SwooleTraining
```

### 3. Run Composer:

```bash
composer install
```

### 4. Run Docker Compose:

```bash
docker-compose up -d
```
### 5. Open Browser:
Open your web browser and go to [http://localhost:8000](http://localhost:8000) to access the SwooleTraining system.

## Stopping the System
To stop the system, run the following command in the project directory:

```bash
docker-compose down
```
##  Additional Information
- The PHP application is configured to run with Swoole, and Nginx is used as the web server.
- MySQL is included as the database, and data persistence is handled using Docker volumes.


