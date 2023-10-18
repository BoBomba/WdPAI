# FROM nginx:1.17.8-alpine
# # FROM nginx:1.25.2-alpine
# # FROM nginx:latest

# # Copy the public directory
# # COPY ./public/ /app/public/
# COPY . /app/

# # Copy the nginx config file
# COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf
# # COPY /Users/damian/Desktop/projekty/WdPAI/docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf

# #COPY /Users/damian/Desktop/projekty/WdPAI/docker/nginx/nginx.conf /Users/damian/Desktop/projekty/WdPAI/config/docker/nginx/default.conf

FROM nginx:1.17.8-alpine

# Copy the public directory
# COPY ./public/ /app/public/
COPY . /app/

# Copy the nginx config file
COPY ./docker/nginx/nginx.conf /etc/nginx/conf.d/default.conf