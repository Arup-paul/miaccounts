 
Implement a  MiAccount

## Requirements
- PHP Version  8.2+
- Laravel 11
- MYSQL


## Installation

-  Clone the repository `git clone https://github.com/Arup-paul/miaccounts.git`

## Install Backend

- Navigate to the Project Directory `cd miaccounts`
- Install the Composer dependencies `composer install`
- Set Up .env File `cp .env.example .env`
- Generate an application key: `php artisan key:generate`
- Clear Cache: `php artisan optimize:clear`
- Configure Database
- `DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=your_database_name
  DB_USERNAME=your_database_username
  DB_PASSWORD=your_database_password`

-   Run Migrations `php artisan migrate`
-   Generate Sample Data `php artisan db:seed`
-   Start the Development Server `php artisan serve`



 ## End Point 

[//]: # ( example host url  = http://127.0.0.1:8000      )

Q1 Report.
-   Access the Q1 report endpoint:  http://127.0.0.1:8000/q1-report

Q2 Report. 
-  Access the Q2 report endpoint:  http://127.0.0.1:8000/q2-report




  


