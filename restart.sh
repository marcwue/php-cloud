docker stop docker-dev
docker rm docker-dev

docker build -t docker-php .

docker run -d --name docker-dev -p 80:80 docker-php