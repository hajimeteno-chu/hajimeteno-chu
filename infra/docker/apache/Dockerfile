FROM nginx:1.20-alpine

ENV TZ=UTC

# nginx config file
COPY ./infra/docker/nginx/*.conf /etc/nginx/conf.d/

WORKDIR /work/backend
