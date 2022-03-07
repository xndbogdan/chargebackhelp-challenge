# Chargeback Help Challenge

## Description
This repo was made to showcase the chargeback help challenge

## Specifications

1. Users are connected to an account (account has multiple users)
2. Login page, application can be accessed only by logged users
3. A page with a form to add a book (title, author, release date), the insert must be unique by author and title. Inserted book belongs to user account.
4. A page where user can list (only) books added to his account in a table. User can see books added by other users from same account.
5. In table must be a column with “Delete” button, to delete a book - delete action is accessible only first 2 days after book was inserted.
6. API endpoint used by an account to fetch (only) its books. (/api/books)
7. API endpoint to get information of a specific book by id (/api/books/1)
8. API is secured with Basic Authentication (username, password)
9. Middleware to log responses (account, status code, content) from "7. API endpoint to get information"
10. Seeder to create demo accounts, users, books (Optional)

## Requirements

- Laravel Policies / Authorization,
- Laravel Middlewares
- Input Validations
- Code Style PSR-5

## Personal goals

- Stick as close as possible to PSR-12
- Use guard clauses whenever possible
- Design a clean, sleek interface
- Write clean code that is easy to understand & extend

## Running the project

- Install the npm and composer dependencies
- Run the migrations, run the seeders
- Configure your env
- Run `npm run prod`

## Notes
- I didn't add permissions as I didn't see what functionality could benefit from them for this example