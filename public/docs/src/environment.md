[Index](./index.html) / [Getting Started](./getting_started.html)

# Environment

This project was primarily developed on a Linux virtual machine using [Vagrant](https://www.vagrantup.com/) and [Homestead](https://laravel.com/docs/5.6/homestead). While the platform you develop on doesn't necessarily matter, you will need a few tools installed in order to download the dependencies and compile the code. **Homestead will include all of these tools for you if you choose to use it.**

## Table of Contents

- [Requirements](#requirements)
- [Development Setup Guide](#development-setup-guide)
    - [Cloning the Repository](#cloning-the-repository)
    - [Setting Up Keys](#setting-up-keys)
    - [Installing Homestead](#installing-homestead)
    - [Using Homestead](#using-homestead)
    - [Project Configuration](#project-configuration)

## Requirements

In order to run/develop the application, you will need the following core requirements installed on the system:
[PHP >= 7.1.3](http://php.net/)
[MySQL Server >= 5.7](https://dev.mysql.com/downloads/mysql/)
[Node.js >= 6.0](https://nodejs.org/en/)
[Composer](https://getcomposer.org/)

For full list of requirements to run Laravel, checkout Laravel's [installation documentation](https://laravel.com/docs/5.6/installation)

## Development Setup Guide

This guide will give you a quick rundown on what you will need in order to setup your development environment.

### Cloning the Repository

If you have not already, clone the repository by running the following in a terminal:
```sh
git clone ssh://ses15a@ranger1.cs.mtsu.edu:/nfshome/ses15a/renova.git
```
Once you have the project working directory set up, you now need to set up your environment to run the site. To make our lives easier, we'll install Laravel Homestead. Full documentation can be found [here](https://laravel.com/docs/5.6/homestead#per-project-installation). If you would rather install everything manually and avoid using a virtual machine (there are valid reasons to), there are many guides available online that demonstrate the process of setting Laravel on a LAMP stack. Some examples are included in the [Delpoyment](./deployment.html) section of the docs.

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
vagrant halt --force
```

### Project Configuration

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
