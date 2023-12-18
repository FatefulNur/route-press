# Url Shortener App
Welcome to a RESTful API based featherweight project that is about compact long url into a shorten one. 

## Installation
```
git clone https://github.com/FatefulNur/route-press.git
```

## Usage
- Open terminal and **run**: `cd <project-name>`.
- Install dependency: `composer install`.
- Copy `.env.example` file into `.env`.
- Database configuration:
    - name: `route_press`.
    - username: *Your database user*.
    - password: *Your database password*.
- Generate app key: `php artisan key:generate`.
- Migrate database: `php artisan migrate`.
- Install any api client to test your project.
    - [Insomnia](https://insomnia.rest/download).
    - [Thunder Client](https://marketplace.visualstudio.com/items?itemName=rangav.vscode-thunder-client).

**Note:** Don't forget to set `Accept: application/json` request header for each api endpoint you have.
To see available route for api **run**: `php artisan route:list --path=api`.

## Greeting 
I hope you feel good to see this. **THANKS**.
