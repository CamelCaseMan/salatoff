@servers(['web' => ['developer@37.143.13.151']])

@setup
$catalog = 'html-'.date("H-i-s-d-m-y");
@endsetup

@story('deploy')
check_dir
git
copy_env
composer
migrate
copy_phpmyadmin
cache
@endstory

@task('check_dir')
cd /var/www/
mkdir {{$catalog}}
@endtask

@task('git')
cd /var/www/{{$catalog}}
git clone https://github.com/work3212/salatoff.git .
@endtask

@task('copy_env')
cd /var/www/config
cp .env /var/www/{{$catalog}}
@endtask

@task('composer')
cd /var/www/{{$catalog}}
composer install --ignore-platform-reqs
@endtask

@task('migrate')
cd /var/www/{{$catalog}}
php artisan migrate:refresh --seed
@endtask

@task('copy_phpmyadmin')
cd /var/www/config
cp work3212 /var/www/{{$catalog}}/public
@endtask

@task('cache')
cd /var/www/{{$catalog}}
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
@endtask



