<p align="center">
<img height="55px" src="https://velvetmedia.it/img/logo-velvet-positivo.svg">
</p>

# Velvet - Search Engine

## Project Requests
- [ ] An accurate recreation of Google's UI and Layout
- [x] Search Functionality
- [x] Titles and Keywords are to be taken into consideration when searching
- [ ] Well documented code
- [x] Pagination
- [x] Order by relevance (URL and Title should be considered before keywords)
- [ ] Use of CSS preprocessors like LESS/SASS
- [ ] Asset management for JS and CSS
- [ ] Logs (File or DB)
- [X] Implements of solid principles
- [X] Adhere to coding standards (Let us know what standard you follow)
- [X] Use of Interfaces
- [X] Dependency management for PHP

##### Time allowed for the task: 20h  
##### Time used for the task: 
- Planning/Documenting: 3h
- Implementation: 5h
- Documentation: 2h
- **Total**: 10h (last update 15/07 - 08:50)

## Technologies used
- Use Laravel framework
- Use Mysql, with Full-Text Search Indexes

## Pattern/Principe used
- MVC (Laravel framework).
- SOLID Principe (App\Http\Controllers\IndexController, \App\Http\Requests\SearchIndexRequest, \App\JBE\Repositories\SearchRepository::execute).
- Repository Pattern (Without the Persistence Layer, Used ORM instead).
- YAGNI Principe ("You Aren’t Gonna Need It").
- KISS Principe ("Keep It Simple, Stupid").

## Uses only the Best Practice
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
git clone linktogithubrepo.com/ projectName
composer install
npm install
cp .env.example .env # then modify it accordly
php artisan key:generate
php artisan migrate --seed # Create database and populate it
```

## Tests
All tests are located in the `\tests` directory.  

>For testing propose you will need a mysql server because the Full-Text Search are implemented using a Mysql Drivers.

To not use the production database during test, change the `DB_DATABASE` in `\phpunit.xml`.

## Contributing
For any issues please contact me using webjure [at] gmail.com. I will respond as soon I can.

## Author
Jure Bernava Prah - webjure [at] gmail.com

## License
Logo: Velvet Media  
The code is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
