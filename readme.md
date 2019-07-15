<p align="center">
<img height="55px" src="https://velvetmedia.it/img/logo-velvet-positivo.svg">
</p>

# Velvet - Search Engine

## Project Requests
- [X] **An accurate recreation of Google's UI and Layout**
    - Used *Blade Engine* and *React Component* (see `\resources\views` and `\resources\js\components`)
- [x] **Search Functionality**
    - Used Mysql Full Text Index (see `database/migrations/2019_07_10_151133_create_websites_table.php`) 
- [x] **Titles and Keywords are to be taken into consideration when searching**
    - And also other columns (that are already indexed by mysql) can be added. See `\App\Website::$searchable` 
- [x] **Order by relevance (URL and Title should be considered before keywords)**
    - Implemented in `\App\Traits\FullTextSearch` and set in `\App\Website::$searchable` array.
- [X] **Well documented code**
    - Try my best to comment all complex code.
- [x] **Pagination**
- [X] **Use of CSS preprocessors like LESS/SASS**
    - Used SCSS files to preprocess css for that project (see `resources/sass/app.scss`)
- [X] **Asset management for JS and CSS**
    - Used Laravel MIX (see `webpack.mix.js`)
- [X] **Logs (File or DB)**
    - Used Default Laravel Logging system. Errors are logged in separate daily file.
- [X] **Implements of solid principles**
    - The Search Repository `\App\JBE\Repositories\SearchRepository` try to use the SOLID principles:
        - **S**ingle Responsibility, because have only one single function `\App\JBE\Repositories\SearchRepository::execute`.
        - **O**pen Closed, because is tested. Test prevent the accidentally modification/delete of code that is used elsewhere. 
        - **L**iskov Substitution, I can easily interchange the implementation with other repository because both implement a same interface `\App\JBE\Repositories\RepositoryInterface`.
        - **I**nterface Segregation, because the interface is super slim and have only one definition of method.
        - **D**ependency Inversion, currently not implemented because it'is not depends on Interfaces. 
- [X] **Adhere to coding standards**
    - MVC (Laravel framework).
    - SOLID Principe.
    - Repository Pattern (Without or rewrite the Persistence Layer. Used Laravel ORM instead).
    - YAGNI Principe ("You Aren’t Gonna Need It").
    - KISS Principe ("Keep It Simple, Stupid").
- [X] **Use of Interfaces**
    - Used to standardize the Business execute code, in repository directory.
- [X] **Dependency management for PHP**
    - Use of Composer.

##### Time allowed for the task: 20h  
##### Time used for the task: 
- Planning/Documenting: 3h
- Implementation: 5h
- Documentation: 2h
- **Total**: 10h (last update 15/07 - 19:30)

## Technologies used
- Use Laravel framework
- Use Mysql, with Full-Text Search Indexes

## Best Practice used
- Schema Migrations.
- TTD Development (Most of the time..).
- Dependence Management with Composer.
- Webpack build with Laravel Mix.
- Use of Dependency injection thanks of Laravel container.
- Use of ORM Models with use of "Query Scope".
- Use of Traits to reuse same code in more places.
- Use of Repository with Interfaces to reuse business logic.

## Install
To use this in production run:
```
git clone ps://jbernavaprah@bitbucket.org/jbernavaprah/velvet-search-engine.git velvet-search-engine
composer install --optimize-autoloader --no-dev
npm install
cp .env.example .env # then modify it accordly
php artisan key:generate
php artisan migrate --seed # Create database and populate it
php artisan config:cache # Optimize and cache configs
php artisan route:cache # Optimize and cache Routes
```

## Tests
All tests are located in the `\tests` directory.  

>**For testing propose you will need a mysql server because the Full-Text Search are implemented using a Mysql Drivers.**  
To prevent lost of data during test, change the `DB_DATABASE` in `\phpunit.xml` to use a correct test database.


## Contributing
For any issues or bug please contact me at webjure [at] gmail.com. I will respond as soon I can.

## Author
Jure Bernava Prah - webjure [at] gmail.com

## License
Logo: Velvet Media  
The code is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
