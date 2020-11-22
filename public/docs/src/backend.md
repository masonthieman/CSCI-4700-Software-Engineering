[Index](./index.html)

# Backend


- [Configurations](#configurations)
- [Service Providers](#service-providers)
- [Custom Validation](#custom-validation)
- [Support and Helper Functions](#support-and-helper-functions)

There is nothing fancy happening on the backend. Everything you see here is standard Laravel backend procedure. As long as you are familiar with how Laravel handles things on the backend, everything here should make sense, and you shouldn't have any issues. See [Laravel's documentation](https://laravel.com/docs/5.6) otherwise

## Configurations

In the project, a lot of configurations are stored in the `/config` folder. They are broken up into their own modules, so that everything isn't crammed together in one giant file. Often when you make new components, it will be helpful to add a configuration. For example, the links on the navigation bar are stored in `config/navbar.php`.

There's not much of a need to go into a lot of detail here, but you can always check out Laravel's documentation if you need help.

## Service Providers

Service Providers are located in `app/Providers`. We use service providers to extend Laravel's validation framework, as well as extend the Blade templating language. Everything here is standard Laravel procedure, so just refer to Laravel's documentation about [Service Providers](https://laravel.com/docs/5.6/providers)

## Custom Validation

We extended Laravel's validation framework to add on some extra rules that you may find pretty handy.

**gender**
Determine if the given value is a gender type (0 or 1).

**phone**
Determine if the given value is a valid U.S. phone number (designed for `@phone` input)

Examples:

```php
"gender_field" => "required|gender",
"phone_number" => "required|phone"
```

## Support and Helper Functions

Often you will want to add some new functionality to the project. Sometimes, it can be as simple as adding a new function, or maybe you want to add a new object system.

### Support

Located in `app/Support`, you can store any new class systems that you make. For example, with this project, we wanted a class to generate form markup. We created the `Form` class, which is located at `app/Support/Form`. Now, whenever we want to use this class, we can simply include it in using the namespace autoloading system. Example:

```php
// `app/Support/MyNewClass.php`

namespace App\Support;

class MyNewClass
{
    ...
}

// --------------------

// some other php file
// Include the new class by adding this at the top

use App\Support\MyNewClass



```

### Helper Functions

It is common that you will start using some sort of routine system when doing certain things within the project. Helper functions are functions declared globally, and they can be used wherever and whenever, including on the frontend. See Laravel's documentation about [helper functions](https://laravel.com/docs/5.6/helpers)

We have our own set that you may use here. For the list of functions and their documentation, simply view `app/helpers.php`

An example of a helper function that we use:

```php
createHash(32) // Generates a random hash 32 characters long
```
