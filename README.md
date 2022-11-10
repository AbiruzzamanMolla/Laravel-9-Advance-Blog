## Installation Process

- Clone this repo `git clone https://github.com/asliabir/Laravel-9-Advance-Blog.git`
- Change Directory to `cd laravel-9-blog`
- Create a database in your database server
- Copy the .env.example file Windows: `copy .env.example .env` Linux: `cp .env.example .env`
- Open .env file and add database information previously created on step-3
- Generate key `php artisan key:generate`
- Install Packeges `composer install`
- Install Node Modules `npm install`, `npm run dev`
- Migrate Database `php artisan migrate:fresh --seed`
- Run Server `php artisan serve`
- Browse http://localhost:8000

## Admin Login
- Browse http://localhost:8000/login
- Email: `admin@mail.com`
- Password: `password`
## Preview
[![Watch the video](https://img.youtube.com/vi/OO3zP2DYlRs/maxresdefault.jpg)](https://youtu.be/OO3zP2DYlRs)



Thank You

## ToDo

- [x] Install Laravel and setup database
- [x] master frontend
- [x] install auth
- [x] master backend
- [x] role and permissions package
- [x] Admin crud
- [x] Category CRUD
  - [x] id
  - [x] title
  - [x] slug
- [x] Tags CRUD
  - [x] id
  - [x] title
  - [x] slug
- [x] post crud
  - [x] id
  - [x] title
  - [x] slug
  - [x] category
  - [x] tags belongs to many
  - [x] short body
  - [x] body
- [x] Updated Towster and sweetalert 2 js for post only
- [x] Dynamic Frontend
  - [x] Show category
  - [x] show post
  - [x] show single post
  - [x] dynamic search bar
  - [x] post by category and tags
- [x] site settings
- [x] Login & Registation Page Redesign
