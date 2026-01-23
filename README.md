# Gym Flow - API
---
## Technologies

This project is a RESTful API developed with a modern and scalable stack:

- **PHP** with **Laravel** for backend development
- **PostgreSQL** as the primary database
- **Docker** for containerization and environment consistency
- **Nginx** as the web server and reverse proxy

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