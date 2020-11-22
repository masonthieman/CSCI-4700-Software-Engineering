[Index](./index.html) / [Getting Started](./getting_started.html)

# Deployment

This will give you a quick rundown of what you will need to deploy the application and to start using it in production. Prior to following this guide, make sure that you have already completed the project setup as if this were the development environme

## Application Environment

You will first need to edit the `.env` file located in the root of the project directory. Credentials for the various services, such as database, mail server, etc, should be filled out here with the appropriate input values, such as usernames and passwords. Make sure that app debugging is disabled as well: `APP_DEBUG=false`

## Server Configuration

Now that the project is configured, you will need to setup the server and services that the application will be running on. *Note: The links provided will assume that you are working with an Ubuntu/Debian environment*

### Web Server Installation

There are many guides online that deal with configuring web servers, such as Apache and Nginx, so a few links to these will be given here.

- [Laravel on Apache](https://www.howtoforge.com/tutorial/install-laravel-on-ubuntu-for-apache/)
- [Laravel on Nginx](https://www.digitalocean.com/community/tutorials/how-to-deploy-a-laravel-application-with-nginx-on-ubuntu-16-04)

The public web directory that should be set in your web server's configuration is `renova/public`.

### MySQL Database

The application was developed using a MySQL database, so a guide will be left here to set up MySQL. You may use another system such as PostgreSQL, or any other supported options, just be sure you make the appropriate changes to the application configuration.

Run the following in a terminal
```sh
sudo apt install mysql-server
```

See the [database documentation](./database.html) for further Database details.

### Dependency Installation

You will need to install NodeJs and Composer in order to install all of the project dependencies. Once these are installed, navigate to the project directory, and execute the following commands:

```sh
# Install Dependencies...
composer update
npm install

# Asset Compilation
npm run prod
```
