# Laravel with Datatable

DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, built upon the foundations of progressive enhancement, that adds all of ...

## Getting started

```sh
# Fork this repository
# git clone <username>/datatables
cd datatables
cp .env.example .env
composer install
php artisan key:generate
touch database/database.sqlite
php artisan migrate
php artisan db:seed
php artisan serve
```

## Features

-   [x] Datatable
    -   [x] Datatable with Ajax
    -   [x] Datatable with Server-side
    -   [x] Searching
    -   [x] Sorting
    -   [x] Paging
-   [x] CRUD
    -   [x] Create
    -   [x] Read
    -   [x] Update
    -   [x] Delete
-   [ ] Tests

## Technology

-   Laravel v9
-   jQuery
-   Styling: Boostrap v5
-   Laravel Datatables

## Code quality

-   PHP Insights
-   PHP CS Fixer

## Testing

Using [Pest]() framework

```
php artisan test
```

## License

This project is licensed under the MIT license.
