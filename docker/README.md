# Docker Application deployment
This is deploying a sample web application using docker container using docker image from scratch.

## Download and install the DOCKER as per your system OS and configurations.

## Enable docker service
sudo systemctl start docker
sudo enable enable docker

## Build the Container Yourself and Push to Docker Hub
Create Docker file and add the set of commands to install an apache server in that machine and to create a webapp inside that machine 

## Build image
docker build -t [image_name] .

## List docker images
docker images

## Use the image built and create a container running a Apache instance inside, use name of our choice

docker run --name [name] -i -t [image_name]
If name is not set, we will need to run docker ps -a 

## Run newly built container

docker run -p 3000:80 image_name


### Open browser and enter localhost:3000/docker.html, webapplication created will be loaded.





