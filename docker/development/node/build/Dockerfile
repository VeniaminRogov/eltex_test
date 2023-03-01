FROM node:18-alpine

COPY ./docker/development/node/etc/docker-entrypoint.sh /usr/local/bin/docker-entrypoint
RUN chmod +x /usr/local/bin/docker-entrypoint

RUN apk add --no-cache yarn fcgi

WORKDIR /var/www/application/symfony

ENTRYPOINT ["docker-entrypoint"]
CMD ["node"]
