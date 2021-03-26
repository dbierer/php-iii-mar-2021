#!/usr/bin/env bash
export CONTAINER="mezzio-project"
if [[ "$1" = "up" ]]; then
	docker-compose up -d
elif [[ "$1" = "down" ]]; then
	docker-compose down
elif [[ "$1" = "shell" ]]; then
	docker exec -it $CONTAINER /bin/bash
elif [[ "$1" = "ls" ]]; then
	docker container ls
else 
	echo "Usage: admin.sh up|down|ls|shell"
fi
