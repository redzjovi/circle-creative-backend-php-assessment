# CRUD Task

## Prerequisites

- Docker
- Docker Compose

## Getting Started

1. Clone the repository:

2. Create a `.env`:

3. Run the application using Docker Compose:

    ```bash
    docker run --rm \
        -u "$(id -u):$(id -g)" \
        -v "$(pwd):/var/www/html" \
        -w /var/www/html \
        laravelsail/php83-composer:latest \
        composer install --ignore-platform-reqs
    docker compose up -d
    ./vendor/bin/sail artisan migrate
    ./vendor/bin/sail npm install
    ./vendor/bin/sail npm run dev
    docker compose down
    ```

4. Open your browser and go to `http://localhost` to see the application running.
