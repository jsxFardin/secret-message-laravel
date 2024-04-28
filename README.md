<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Secret message

Simple chat app using laravel

## installation 

- Clone the repository on your server or your local environment for development purpose.
- Run the following command to install **Composer** packages and its dependencies.
  ```
  composer install
  ```
- Copy the example environment file.
  ```
  cp .env.example .env
  ```
- Edit the environment file by running this command.
  ```
  .env
  ```
- Configure database, mail and other necessary things.
- Run the following command to generate the application key.
  ```
  php artisan key:generate
  ```
- Migrate and seed the database.
  ```
  php artisan migrate --seed
  ```
- Run the following command to install **NodeJS** packages and its dependencies.
  ```
  npm install or yarn install
  ```
- Run frontend 
  ```
  npm run dev or yarn dev
  ```
- Run backend
  ```
  php artisan serve
  ```
- Run for Delete read messages older than one hour 
  ```
  php artisan messages:delete-read
  ```

## video
- [video link](https://drive.google.com/file/d/1Ap3FlRphj3KE2ciQupXI69P205cUJY5r/view?usp=sharing)