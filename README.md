# Deploy document

## How to install
1. [Install Composer](https://getcomposer.org/download/) and then [install Laravel](https://laravel.com/docs/5.5/installation) and [Git](https://git-scm.com/book/en/v2/Getting-Started-Installing-Git) on your server if you haven't already
2. Clone this repository on your server by running this command: `git clone https://github.com/ssssssander/landoretti.git`
3. Create a `.env` file in your project root folder based on the `.env.example` file, also located in the project root folder. Make sure you fill in database info, mail info, your app URL, your app key, whether or not you're running the project in production and anything else you may want to add
4. Run `composer install` in your project root folder to install all the Composer dependencies
5. Run `npm install` in your project root folder to install all the npm dependencies
6. Run `crontab -e` (or `nano /etc/crontab`) and add this Cron entry to the end of the file to set up the Laravel scheduler: `* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1`

## Additional info
- This project uses the following dependencies: `laravelcollective/html`, `guzzlehttp/guzzle`, `davejamesmiller/laravel-breadcrumbs` and `vue` along with any other framework dependencies
- When an auction expires all bidders will be notified by email
- Remember to never make your `.env` file publicly available
