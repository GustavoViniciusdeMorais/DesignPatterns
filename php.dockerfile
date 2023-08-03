FROM gustavovinicius/gusphp:latest

# RUN apt update

# RUN apt install nginx -y

# RUN apt install nano

# RUN apt install curl -y

# RUN apt update

# RUN apt install systemctl -y

ADD ./nginx/default.conf /etc/nginx/sites-available/default

# RUN chmod u+x phpInstall.sh

# RUN phpInstall.sh

# RUN mkdir /var/www/mysite

# RUN mkdir /var/www/other

# WORKDIR /var/www/html


ENTRYPOINT ["tail", "-f", "/dev/null"]