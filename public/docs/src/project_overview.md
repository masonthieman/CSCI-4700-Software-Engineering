[Index](./index.html) / [Getting Started](./getting_started.html)

# Project Overview

This project was developed using PHP 7.2 and the [Laravel](https://laravel.com/) framework. Laravel is one of the largest, most popular, and most documented frameworks available for PHP. The documentation here may cover very little of anything that is standard with Laravel; so if you can't find what you are looking for here, check out the [Laravel documentation](https://laravel.com/docs/5.6)!

## Table of Contents

- [Project Structure](#project-structure)
- [Code Guidelines](#code-guidelines)
    - [Indentation](#indentation)
    - [Name Styling](#name-styling)
        - [Class Names](#class-names)
        - [Method and Variable Names](#method-and-variable-names)
        - [Function Names](#function-names)
        - [Database Naming](#database-naming)

## Project Structure

Laravel uses the MVC (Model View Controller) standard. If you are unaware of how this works, you should surely look into it, it's definitely worth your time! As stated earlier, you would only be touching around 5% of the files in the project. Below will give you an idea of the files that you'll be working with from the project file structure:

    renova          - Project Root
    ├── app         - Backend
    ├── database    - Database
    ├── resources   - Frontend
    └── routes
        └── web.php - Page URLs

The documentation of frontend and backend development will each cover their aspect of the project file structure in more detail, but this should give you a rough idea of what you'll actually be working with.

## Code Guidelines

You should be following a consistent convention of code style when working on this project. We follow all of the Laravel conventions to keep everything as consistent as possible.

### Indentation

**Please use spaces instead of tabs**. While yes, tabs are indeed better than spaces, it is Laravel's convention to use 4-space indentation, so please stick with them. Stop reading right now and go change your editor's settings before you forget!

### Name Styling

Laravel sort of mixes between using camelCase and snake_case. It depends on the part of the application that you are using. **These styles apply to both Javascript and PHP unless specified otherwise!**

#### Class Names

Class names should be UpperCamelCase/PascalCase such that every word in a class name is begins with an uppercase letter. Acronyms are included in this standard.

```php
// standard names
class myClass // This is invalid
...
class MyClass // This is correct

// acronyms
class ObjectURL // This is incorrect (acronym `URL` is all caps)
...
class ObjectUrl // This is correct
```

#### Method and Variable Names

Both methods and variables share the same style. Both are standard camelCase.

```php
// Variables
$my_variable // This is snake_case. This is invalid
...
$MyVariable // This is PascalCase. This is invalid
...
$myVariable // This is correct

// Methods (Not the same as functions!!!)
public function my_method() // This is snake_case. This is invalid
...
public function MyMethod() // This is PascalCase. This is invalid
...
public function myMethod() // This is correct
```

#### Function Names

On the backend side, it is convention for normal functions (which are just helper functions in Laravel) to be snake_case; **however**, this convention was broken, and we used camelCase instead. You may change it around the other way if you choose. I started in camelCase without realizing it was supposed to be in snake_case. Whatever, as long as you're consistent with the rest of the code.

```php
function MyFunction() // This is invalid
...
function my_function() // This is valid, but not what we used
...
function myFunction() // We used this, but it does break Laravel convention
```

#### Database Naming

All tables and columns should be lowercase snake_case

```sql
QuestionnaireForm /* This is invalid */
...
questionnaire_form /* This is valid */
```
