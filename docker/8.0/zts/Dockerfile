FROM php:8.0-zts

RUN php -r "copy('https://raw.githubusercontent.com/radianceteam/ton-client-php-ext/1.37.2/installer.php', 'installer.php');"
RUN php -r "if (hash_file('sha384', 'installer.php') === '03586e200bc1c87f000c5a0eea27aa688eb451a5b946579205ca918bbffda7234359e2d0e176aa53e841c6a77b8de959') { echo 'Installer verified'; } else { echo 'Installer corrupt'; exit(1); } echo PHP_EOL;"
RUN php installer.php -v 1.37.2
RUN php installer.php -v 1.37.2 -T
RUN rm installer.php