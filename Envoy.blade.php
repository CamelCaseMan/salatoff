@servers(['web' => ['developer@37.143.13.151']])

@setup
$catalog = 'html-'.date("H-i-s-d-m-y");
@endsetup

@story('deploy')
check_dir
@endstory

@task('check_dir')
cd /var/www/
mkdir {{$catalog}}
@endtask