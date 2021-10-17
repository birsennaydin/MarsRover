
# MarsRover
- API
- Create plateau
- Get plateau
- Create rover
- Send commands to rover (sample request above)
- Get rover
- Get rover state

## API
- Passport api was used for testing (You can find in app.php file)
- Use the bearer token.
## Topology
- Controller
- Traits
- Redis
### Database Logic
- Mysql was used to store the user information to be used to obtain Bearer tokens. Redis was used to manage information about plateau and rover.

# Usage
To run this demo you'll need to have Mysql, Php installed
- Clone the repo
- Install the dependencies with composer install
- Copy .env.example to .env
- Create a  database
- Run php artisan key:generate
- Run php artisan migrate

# Tecnical Details
- Php 7.4.20
- Laravel 8.63.0
- Mysql
- Passport
- Redis

# Input & Output
- If you want to try it, you can use the file named MarsRover1.postman_collection.json under public/. You can use the Postman.

# API Document
https://documenter.getpostman.com/view/3425403/UV5WDyH8


