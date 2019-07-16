<p align="center">
<img height="55px" src="https://velvetmedia.it/img/logo-velvet-positivo.svg">
</p>

# Velvet - Search Engine

## Project Requests
- [X] **An accurate recreation of Google's UI and Layout**
    - I used *Blade Engine* and *React Component* (see `\resources\views` and `\resources\js\components`)
- [x] **Search Functionality**
    - I used Mysql Full Text Index (see `database/migrations/2019_07_10_151133_create_websites_table.php`) 
- [x] **Titles and Keywords are to be taken into consideration when searching**
    - And also other columns (that are already indexed by mysql) can be added. See `\App\Website::$searchable` 
- [x] **Order by relevance (URL and Title should be considered before keywords)**
    - Implemented in `\App\Traits\FullTextSearch` and set in `\App\Website::$searchable` array.
- [X] **Well documented code**
    -  I tried my best to comment all complex code.
- [x] **Pagination**
- [X] **Use of CSS preprocessors like LESS/SASS**
    - I used SCSS files to preprocess css for that project (see `resources/sass/app.scss`)
- [X] **Asset management for JS and CSS**
    - I used Laravel MIX (see `webpack.mix.js`)
- [X] **Logs (File or DB)**
    - I used Default Laravel Logging system. Errors are loggedn a separate file daily.
- [X] **Implements of solid principles**
    - The Search Repository `\App\JBE\Repositories\SearchRepository` I tried to use the SOLID principles:
        - **S**ingle Responsibility, because it has only one single function `\App\JBE\Repositories\SearchRepository::execute`.
        - **O**pen Closed, because it is tested. The test prevents from any accidental modification or deletion of code that may be used somewhere else. 
        - **L**iskov Substitution, I can easily interchange the implementation with other repository because both implement a same interface `\App\JBE\Repositories\RepositoryInterface`.
        - **I**nterface Segregation, because the interface is super slim and it has only one definition of method.
        - **D**ependency Inversion, currently not implemented because it does not depend on interfaces. 
- [X] **Adhere to coding standards**
    - MVC (Laravel framework).
    - SOLID Principe.
    - Repository Pattern (Without or rewrite the Persistence Layer. Used Laravel ORM instead).
    - YAGNI Principe ("You Aren’t Gonna Need It").
    - KISS Principe ("Keep It Simple, Stupid").
- [X] **Use of Interfaces**
    - I used to standardize the Business execute code, in repository directory.
- [X] **Dependency management for PHP**
    - I used Composer to manage php dependencies.

##### Time allowed for the task: 20h  
##### Time used for the task: 
- Planning/Documenting: 3h
- Implementation: 5h
- Documentation: 2h
- **Total**: 10h (last update 15/07 - 19:30)

## Technologies used
- **Laravel** framework
- **Mysql**, with Full-Text Search Indexes

## Best Practice used
- Schema Migrations.
- TTD Development (Most of the time..).
- Dependence Management with Composer.
- Webpack built with Laravel Mix.
- Dependency injection thanks of Laravel container.
- ORM Models with "Query Scope".
- Traits to reuse the same code in more places.
- Repository with Interfaces to reuse business logic.

## Install
To run project locally:
```
# clone project

$ git clone https://jbernavaprah@bitbucket.org/jbernavaprah/velvet-search-engine.git velvet-search-engine
$ cd velvet-search-engine

# Install all dependecies

$ composer install
$ npm install 

# Configure enviroment

$ cp .env.example .env 


$ php artisan key:generate
$ php artisan migrate --seed # Create tables and populate it

$ php artisan serve # To start project on http://127.0.0.1:8000
```

## Tests
All tests are located in the `\tests` directory.  

>**For testing propose you will need a mysql server because the Full-Text Search are implemented using a Mysql Drivers.**  
To prevent loss of data during test, change the `DB_DATABASE` in `\phpunit.xml` to use a correct test database.


## Contributing
For any issues or bug please contact me at webjure[at]gmail.com. I will respond as soon as possible.

## Author
Jure Bernava Prah - webjure[at]gmail.com

## License
Logo: [Velvet Media](https://velvetmedia.it)  
The code is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
