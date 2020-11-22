[Index](../index.html)

The frontend is composed using Laravel's Blade templating engine, and Sass stylesheets.

We have a lot of prebuilt utilities that you will be able to use, such as Ajax form automation, tables, andy many custom Blade directives to save you loads of time!

## Table of Contents

- [Views and Components](#views-and-components)
- [Assets and Locales](#assets-and-locales)
- [Custom Blade Directives](./custom_blade_directives.html)
- [Forms](./forms.html)
	- [Ajax Automation](#ajax-automation)
	- [Dynamic Form Elements](#dynamic-form-elements)
	- [Field Population](#field-population)
- [Tables](./tables.html)
- [Tabs](./tabs.html)

## Views and Components

Laravel's Blade templating engine works by creating files called "views" which will be displayed on the browser side. Views can be imported into other views, base views can be defined and inherited/extended from, etc. These views are located in `renova/resources/views`.

This is the view file structure that we used:

	views              - The views root directory
    ├── base           - Base views to extend from
    ├── component      - components are "imported" into views
    ├── modal          - modal dialogs that are "imported"
    ├── test           - test pages
	...                - All main webpage views

Large views can often be broken up into smaller views to increase workflow efficiency. The questionnaire for example, is nearly 3,000 lines long; so to make workflow more efficient, we split each section into individual views, which are located in `views/questionnaire`. Then, all we have to do is include those views in the main `views/questionnaire.blade.php` file.

If you're familiar with HTML, you're probably wondering about all of the `@` things. These are known as Blade directives. These directives tell Blade how to assemble the final web page. We use quite a few custom Blade directives, so see the [Custom Blade Directives](./custom_blade_directives.html) section for more detail.

You can find the complete [Blade documentation](https://laravel.com/docs/5.6/blade) on Laravel's website.

## Assets and Locales

### Assets
Assets, such as images, CSS/Sass, Javascript, etc., are not surprisingly located in `renova/resources/assets`.

In both, the `assets/js` and `assets/sass` folders, you will notice an `app.js` and `app.scss` file respectively. These are the assembly files. You will define your Javascript or stylesheets in their own appropriate files, and you will import everything in those app files. **NO CODE OTHER THAN IMPORTS SHOULD BE INSIDE app.js OR app.scss!**

These assets are then compiled using NodeJs and Webpack by running one of the following command:
```sh
npm run dev  # Development compilation
npm run prod # Production compilation (minifies code)
```

Compiling every single time you make a change will get annoying though, so for your convenience, you can run this command, and it will watch your files as you make changes to them and compile them for you.
```sh
npm run watch-poll # Watch files, compile only changes
```

### Locales
Locals are located in `renova/resources/lang`. Locales are used to store any kind of translations, or messages/text that you do not want to hardcode into the application.

For example, the validation messages that are displayed are located in `lang/validation.php`. Here, you can set the default messages to display if a type of validation error occurs, you change how a field name is displayed, etc.

A lot of the components that we used were assigned locale files for convenience, such as the navigation bar, and the custom tab and table directives. When making any kind of reusable component, you should try to make use of these locales!


