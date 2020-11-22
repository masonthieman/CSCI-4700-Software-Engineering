# Renova Health Care Plan Summary Tool
The Renova Health Care Plan Summary Tool for CSCI 4700 Spring semester at Middle Tennessee State University

## Table of Contents
- [Project Structure](#project-structure)
    - [Backend](#backend)
    - [Frontend](#frontend)
- [Local Development Environment Setup](#local-development-environment-setup)
    - [Setting Up Keys](#setting-up-keys)
    - [Installing Homestead](#installing-homestead)
    - [Using Homestead](#using-homestead)
- [Project Configuration](#project-configuration)
- [Frontend Development](#frontend-development)
    - [Asset Compilation](#asset-compilation)
- [Database Configuration](#database-configuration)
    - [General](#database-general)
    - [Initialization](#database-initialization)
    - [Tear Down](#database-tear-down)

## Project Structure
This project was developed using the [Laravel](https://laravel.com/) 5.6 framework. Basic knowledge of Laravel will be required in order to maintain this project.

### Backend
Backend is simply using the normal controller scheme within Laravel. Eloquent is used for the database models.

### Frontend
Frontend is developed using Blade, HTML, Javascript, and Sass/CSS. Frontend markup is divided into base templates and components, which are all put together and assembled in each of the web pages.

#### Frameworks
- [Bootstrap 4](https://getbootstrap.com/)
- [jQuery](https://jquery.com/)

#### Directory Structure
    resources
    ├── assets
    │   ├── js
    │   └── sass
    └── views
        ├── base
        ├── component
        └── <web pages>.blade.php

## Local Development Environment Setup
If you have not already, clone the repository by running the following in a terminal:
```sh
git clone ssh://ses15a@ranger1.cs.mtsu.edu:/nfshome/ses15a/renova.git
```
Once you have the project working directory set up, you now need to set up your environment to run the site. Normally setting up a standard LAMP stack can take time, so instead we'll use Laravel Homestead. Full documentation can be found [here](https://laravel.com/docs/5.6/homestead#per-project-installation), but I will do a much quicker set up guide here.

### Setting Up Keys
Before you begin, you will need to generate some keys if you do not have any already (check for `~/.ssh/id_rsa` and `~/.ssh/id_rsa.pub`). If you are on Mac or Linux, use a standard terminal; otherwise, use a Git terminal and run the following command. **Note:** Leave all fields/questions blank, just keep hitting enter/return.
```sh
ssh-keygen
```

### Installing Homestead
First, you will need to install [VirtualBox](https://www.virtualbox.org/wiki/Downloads) and [Vagrant](https://www.vagrantup.com/downloads.html). Once those are installed, go ahead and create the virtual machine by running the following command:
```sh
vagrant box add laravel/homestead
```

Next, clone the Homestead Git repository and `cd` into the directory:
```sh
git clone https://github.com/laravel/homestead.git ./Homestead
cd ./Homestead
```

Now that you are in the Homestead directory, you need to initialize Homestead. Do so by running one of the following depending on your operating system
```sh
./init.sh    # For Mac/Linux
./init.bat   # For Windows
```

Now open `Homestead.yaml` in your favorite editor. You should only need to change a few lines as listed below:
```yaml
folders:
    - map: <path to project root>     # Change this to your local path to the project
      to: /home/vagrant/renova        # The path in the virtual machine

sites:
    - map: renova.dev                 # The website address
      to: /home/vagrant/renova/public # The public directory that will be served

databases:
    - renova
```

Now you will need to add this website domain to your `hosts` file. If you are on Windows, you will need to run your editor as Adminitstrator, and open  `C:\Windows\System32\drivers\etc\hosts`. If you are on Mac/Linux, open `/etc/hosts` as super user. Then, add the following line:
```hosts
127.0.0.1	renova.dev
```

Homestead is now installed and configured on your system!

### Using Homestead
This will be a quick rundown on how you will be using Homestead from here on out. Homestead is a virtual machine (VM), meaning you will need to start it up when you are to work on the project. Any packages that you will install, either by using Node or Composer, will be installed inside the VM via SSH. **All following commands must be executed within your `Homestead` directory**. **Windows users must be using a terminal with administrator privilages, otherwise scripts can fail**.

To start your Homestead VM, simply execute the following command:
```sh
vagrant up
```

You should now be able to visit the website with the URL [http://renova.dev:8000](http://renova.dev:8000) (**do not use https!**), although if you have not yet configured the project, you will receive an error page.

Next, you can SSH into your Homestead VM by running the following command
```sh
vagrant ssh
```
Here, you will be able to access Composer and Node Package Manager (npm) to install additional libraries and packages.

If you would like to stop your Homestead VM, run the following command:
```sh
vagrant destroy --force
```

## Project Configuration

For the following steps, you will need to be log in to your Homestead VM using SSH (See [Using Homestead](#using-homestead) section for more details) and `cd` to your project directory (`/home/vagrant/renova` by default).

Now that you have your development environment set up, you will need to quickly configure your project. Start by copying the `.env.example` to `.env` so you can setup your configuration (this file will be ignored by Git). You can adjust your environment configurations using this new file, but everything should work by default.
```sh
cp ./.env.example .env
```

Next, you will need to finish installing all of the dependencies for the project. Execute the following two commands (one at a time or simultaneously) to install the dependencies:
```sh
composer update
npm install
```

Finally, you will need to generate your application key. Simply run:
```sh
php artisan key:generate
```

Your project should now be fully set up and ready to go!

## Frontend Development
When developing the front end, you will be working entirely within the `resources` directory. See the [frontend project structure](#frontend) section. As you edit your stylesheets, scripts, and other assets, you will want to compile them and send them to the public directory. You will not do this manually, instead you will run some `Node` commands in a Vagrant SSH session to do this for you.

### Asset Compilation
To do a one time compilation of all assets, simply run one of the following:
```sh
npm run dev  # This will simply compile assets
npm run prod # This will compile and minify assets
```

As you are editing however, this can get annoying recompiling every single time. You can let `Node` compile as you edit by running the following:
```sh
npm run watch-poll
```

## Database Configuration

### General
The database is a run on an external MySQL server.

All related documentation, scripts, etc are located in the  `<project_root>/database/` directory.

Information about the database schema can be found in a document called
`schema.md`.

### Initialization
The database must be initialized by running a script called `create_db.sql`
located in the `sql_scripts` sub-directory. This script must run on a MySQL
server instance inside of an empty database schema. This can be done in
a SQL graphical editor or more simply executed using the MySQL command
line utility.
Go to the `<project_root>/database/sql_scripts` directory.
To access MySQL command prompt for server, bash execute:
```
mysql -h <SQL_server_address> -u <SQL_server_username> -p <schema_name>
```

Enter password and execute:
```
source create_db.sql
```

This will execute a series of queries which will build all database
tables, define triggers, and create a default user `admin` with password
`secret`. Please change default password immediately.

### Tear Down
To COMPLETELY DESTROY the database, follow instructions from [Initialization](#database-initialization) to enter MySQL command prompt inside of the `sql_scripts` directory and execute:
```
source delete_db.sql
```

### Editing TCM Form

## Adding a new non-dynamic field:

1. go to the create_tcm_forms_table.php file under database\migrations
2. under the comment //add fields here, add in the exact name that you gave the input field on the front end
   - for references to the functions, see here: https://laravel.com/docs/5.6/migrations#creating-columns
3. go to the TcmForm.php model under app\Models
4. enter in the same field name you entered in create_tcm_forms_table.php in the $fillable array
   - if the field is a date field, add it to the $dates array as well
5. go to the TcmFormRequest.php file under app\Http\Requests\
6. add the same field name in the rules() return array with any validation you'd like to put on that field
   - see PatientAddRequest.php for examples of validation
7. `vagrant ssh` in a separate terminal in your Homestead directory
8. `cd renova`
9. `php artisan migrate` (not 100% on this one)
   - run `php artisan migrate:fresh` and `php artisan db:seed` to reset database
10. Test
11a. In case of success, celebrate
11b. In case of failure, chin up and push on

## Adding a new dynamic field:

1. under the tcm.blade.php file, add in a new template for dyanamic fields under the "dynamic_templates" section (there is an example already in there)
    - you can add any fields you'd want to have inside of this template
2. in your tabe blade file, add in `@dynamicarea("field_name", "template_name", "Entry")`
3. `vagrant ssh` and `cd renova`
4. run `php artisan make:migration create_tcm_[field_name_here]s_table` (w/o brackets and be sure it is plural)
5. go to the file you created (should be under database\migrations)
6. under the up() create() function, add `$table->integer('tcm_form_id');` and `$table->string('[sub_field_name]')->nullable()->default(null);` where [sub_field_name] is the name(s) of the sub field(s) you added to the dynamic template
7. make a copy of TcmDischargeIcd.php under app\Models\ and rename it to Tcm[YourField].php (singular)
8. change the $request_key to match the name you gave your dynamic field
9. change any fields after 'tcm_form_id' in the $fillable array to match the sub fields you creatd
10. go to TcmForm.php
11. at the bottom of the submit function, add `[ModelFileName]::createManyFromRequest($request, $formId);` where [ModelFileName] is the name of the dynamic field model name
12. in the $sections array under the clear() function, add `[ModelFileName]::class`
13. Test, and enjoy
