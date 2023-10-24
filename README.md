# Prueba de código para Mundo
Desarrollo de una API Rest en Laravel, junto con un frontend desarrollado en React.js para consumir la API.

## Instrucciones para ejecutar

1. [Instalar Docker](https://docs.docker.com/desktop/), si es que este no se encontrara instalado en el equipo.
2. Copiar el siguente código y guardarlo en un archivo de texto con el nombre `docker-compose.yml`:

    ```yaml
    version: '3.8'
    services:
        mysql:
            image: mysql:latest
            environment:
                MYSQL_ROOT_PASSWORD: 'secret'
                MYSQL_USER: 'mundo'
                MYSQL_PASSWORD: 'secret'
                MYSQL_DATABASE: 'mundo'
            ports:
                - 3306:3306
        backend:
            image: n1c0saurio/mundo_backend:latest
            tty: true
            stdin_open: true
            working_dir: /backend
            ports:
                - 8080:80
        frontend:
            image: n1c0saurio/mundo_frontend:latest
            ports:
                - 3000:3000

    ```
3. Abrir una terminal en la carpeta donde se guardó el archivo `docker-compose.yml` y ejecutar el siguiente comando:
    
    ```
    docker-compose up
    ```
4. En el navegador, escribir en la barra de dirección `http://localhost:3000` para ingresar al front del proyecto. También se puede ingresar a la API directamente escribiendo la dirección `http://localhost:8080`. 