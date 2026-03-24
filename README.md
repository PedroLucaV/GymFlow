# Gym Flow - API

<p align="center">
  <img src="https://img.shields.io/badge/PHP-v8.2-blue?style=for-the-badge&logo=php" />
  <img src="https://img.shields.io/badge/Laravel-v12+-darkred?style=for-the-badge&logo=laravel" />
  <img src="https://img.shields.io/badge/Docker Compose-V5+-2D3748?style=for-the-badge&logo=docker" />
  <img src="https://img.shields.io/badge/PostgreSQL-15-blue?style=for-the-badge&logo=postgresql" />
  <img src="https://img.shields.io/badge/Nginx-Server-green?style=for-the-badge&logo=nginx" />
  <img src="https://img.shields.io/badge/Redis-Cache-red?style=for-the-badge&logo=redis" />
</p>


---
## Technologies

This project is a RESTful API developed with a modern and scalable stack:

- **PHP** with **Laravel** for backend development
- **PostgreSQL** as the primary database
- **Docker** for containerization and environment consistency
- **Nginx** as the web server and reverse proxy
- **Redis** for caching and performance optimization

---
## Overview

Gym Flow API is a RESTful service designed to manage gym operations such as users, workouts, plans, and subscriptions.

---
## Requirements

- Docker & Docker Compose

---
## Installation

1. Clone the repository
```bash
git clone https://github.com/PedroLucaV/GymFlow.git
cd GymFlow
```

2. Copy environment variables
```bash
cp .env.example .env
```

3. Start containers
```bash
docker-compose up -d
```

4. Run migrations
```bash
docker exec -it app php artisan migrate
```