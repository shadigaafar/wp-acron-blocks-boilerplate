FROM wordpress:php8.4-apache


RUN apt-get update && apt-get install -y \
    sudo \
    nano \
    git \
    unzip \
    # Install WP-CLI
    && curl -o /usr/local/bin/wp https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar \
    && chmod +x /usr/local/bin/wp \
    \
    # Install Composer
    && curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer
  
# Activate plugin automatically using WP-CLI during container start
RUN mkdir -p /docker-entrypoint-initwp.d
COPY activate-plugin.sh /docker-entrypoint-initwp.d/activate-plugin.sh
RUN chmod +x /docker-entrypoint-initwp.d/activate-plugin.sh