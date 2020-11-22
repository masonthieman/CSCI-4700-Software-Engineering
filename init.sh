# Run this script to initialize the project.
# If you are using Vagrant, be sure to run
# the script within the Vagrant VM.

# Install dependencies
composer install
npm install

# Generate an application key
php artisan key:generate

