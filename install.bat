
echo MOSIT-Digital-Department installation script 1.0
echo.

echo Steps
echo 1. Clone repository
echo 2. Change dir
echo 3. Install dependencies
echo 4. Check .env file
echo 5. Install migrations
echo 6. Database seeding

pause

goto :clone




:clone

echo Cloning from repository
echo.

if exist mdd (
    goto :cd
) else (
    git clone https://github.com/pmswga/MOSIT-Digital-Department mdd
    goto :cd
)

:cd

if exist mdd (
    cd mdd
    
    if exist mdd (
        cd mdd
        goto :composer_install
    ) else (
        echo Folder 'mdd' not exists
    )
    
) else (
    echo Folder 'mdd' not exists
)


:composer_install

echo Install dependencies
echo.

if exist composer.json (

    if not exist vendor (
        composer install
    )
    
    goto :check_env

) else (
    echo File 'composer.json' not exist
)

:check_env


echo Check .env file
echo.

if exist .env (
    goto :migration_up
) else (
    rename .env.example .env
    php artisan key:generate
    
    goto :migration_up
)


:migration_up

echo Install migrations
echo.

php artisan migrate --path=database\migrations\
php artisan migrate --path=database\migrations\**\*

:database_seeding

echo Database seeding
echo.

php artisan db:seed
