FROM orchardup/php5
RUN apt-get -y install php5-curl
ADD . /code
