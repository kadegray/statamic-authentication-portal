# Statamic Authentication Portal

A simple authentication portal using Statamic and Laravel.

## Setup / Install

**Requirements**

-   PHP ^8.2
-   Node 18

**Install**

```shell
composer install
npm i
npm run build
cp .env.example .env
php artisan key:generate
```

**Create a Customer**
Use the register form at `/register`.

**Create a CP user**

```shell
php please make:user
```

## Design Process

During an R&D phase I experimented with starting with a fresh Laravel project a fresh Statamic project would be best. I was curious to see whether there was any friction in setting up Livewire 3 alongside Statamic. I had decided to use Livewire for the Register and Login pages because it is so fast and simple, also because I hadn't used Livewire 3 and was interested in how far it had improved from version 2.

This project started with a fresh Statamic install with the CLI. Livewire was then installed. Livewire components for Customer authentication pages were created.

Statamic's users were brought from the flat files into the MySQL database following the steps here: https://statamic.dev/tips/storing-users-in-a-database. Making **Users**, now in the database, **Statamic Control Panel users**.

A **Customer model** was then created with a schema to match that of the users table. And an **auth provider and guard** was configured, named **portal**.

The structure of the authentication:

-   `User` is the the term for users of the Statamic Control Panel.
    -   Authentication and management is handled by Statamic Control Panel.
    -   The auth guard for Users is `web`.
-   `Customer` is the term for users who can gain access to the site through the website authentication.
    -   Customer creation is done through the Register page.
    -   The auth guard for Customers this is `portal`.

Customers can be seen and managed in Statamic CP. Runway was installed and configured to achive this.

Regarding design and tailwind in the templates, I did use mostly templates copied from free template sites. I reasoned that I shouldn't spend much time on design because this project is about authentication.
