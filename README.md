# API REST M020

Creación de 2 servicios utilizando **Symfony 4**:

* **Servicio 1**:
    * **Descripción**: Servicio que realiza una petición al API de PunkApi y permite buscar en base a una cadena. El campo para filtrar será **food** y devolverá los siguientes datos:
        * id.
        * nombre.
        * descripción.
    * **Versión Básica**
        * Path: /api/beer
        * Parámetros:
            * Required: food={string}
        * Método: GET
        * Respuesta Correcta:
            * Código: 200. Se han encontrado resultados que coinciden con el parámetro de búsqueda.
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        {
                          "id": 1, 
                          "nombre": "nombre 1", 
                          "descripcion": "descripción 1"
                        }, 
                        {
                          "id": 2, 
                          "nombre": "nombre 2", 
                          "descripcion": "descripción 2"
                        }
                      ],
                      "status": 200
                    }
                    ```
        * Respuestas Erróneas:
            * Código: 204. No se han econtrado resultados que coincidan con el parámetro de búsqueda.
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        { }
                      ],
                      "status": 204
                    }
                    ```
            * Código: 400. Se ha introducido un parámetro no válido en la url (Bad Request).
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        { }
                      ],
                      "status": 400
                    }
                    ```
    * **Versión DDD**
        * Path: /api/v1/beer
        * Parámetros:
            * Required: food={string}
        * Método: GET
        * Respuesta Correcta:
            * Código: 200. Se han encontrado resultados que coinciden con el parámetro de búsqueda.
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        {
                          "id": 1, 
                          "nombre": "nombre 1", 
                          "descripcion": "descripción 1"
                        }, 
                        {
                          "id": 2, 
                          "nombre": "nombre 2", 
                          "descripcion": "descripción 2"
                        }
                      ],
                      "status": 200
                    }
                    ```
        * Respuestas Erróneas:
            * Código: 204. No se han econtrado resultados que coincidan con el parámetro de búsqueda.
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        { }
                      ],
                      "status": 204
                    }
                    ```
            * Código: 400. Se ha introducido un parámetro no válido en la url (Bad Request).
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        { }
                      ],
                      "status": 400
                    }
                    ```
* **Servicio 2**: 
    * **Descripción**: Servicio que realiza una petición al API de PunkApi en base a una cadena (se podrán pasar múltiples ids separados por el símbolo |, por ejemplo: 1|2|3) y retorna los datos necesarios para pintar una vista de detalle que indique los datos del servicio anterior, y que además incluya los siguientes datos: 
        * imagen.
        * slogan (tagline).
        * fecha de fabricación (first_brewed).
    * **Versión Básica**
        * Path: /api/beer/detail
        * Parámetros:
            * Required: id={string}
        * Método: GET
        * Respuesta Correcta:
            * Código: 200. Se han encontrado resultados que coinciden con el parámetro de búsqueda.
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        {
                          "id": 1, 
                          "nombre": "nombre 1", 
                          "descripcion": "descripción 1",
                          "imagen": "imagen 1",
                          "slogan": "slogan 1",
                          "fechaFabricacion": "fechaFabricacion 1"
                        }, 
                        {
                          "id": 2, 
                          "nombre": "nombre 2", 
                          "descripcion": "descripción 2",
                          "imagen": "imagen 2",
                          "slogan": "slogan 2",
                          "fechaFabricacion": "fechaFabricacion 2"
                        }
                      ],
                      "status": 200
                    }
                    ```
        * Respuestas Erróneas:
            * Código: 204. No se han econtrado resultados que coincidan con el parámetro de búsqueda.
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        { }
                      ],
                      "status": 204
                    }
                    ```
            * Código: 400. Se ha introducido un parámetro no válido en la url (Bad Request).
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        { }
                      ],
                      "status": 400
                    }
                    ```
    * **Versión DDD**
        * Path: /api/v1/beer/detail
        * Parámetros:
            * Required: id={string}
        * Método: GET
        * Respuesta Correcta:
            * Código: 200. Se han encontrado resultados que coinciden con el parámetro de búsqueda.
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        {
                          "id": 1, 
                          "nombre": "nombre 1", 
                          "descripcion": "descripción 1",
                          "imagen": "imagen 1",
                          "slogan": "slogan 1",
                          "fechaFabricacion": "fechaFabricacion 1"
                        }, 
                        {
                          "id": 2, 
                          "nombre": "nombre 2", 
                          "descripcion": "descripción 2",
                          "imagen": "imagen 2",
                          "slogan": "slogan 2",
                          "fechaFabricacion": "fechaFabricacion 2"
                        }
                      ],
                      "status": 200
                    }
                    ```
        * Respuestas Erróneas:
            * Código: 204. No se han econtrado resultados que coincidan con el parámetro de búsqueda.
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        { }
                      ],
                      "status": 204
                    }
                    ```
            * Código: 400. Se ha introducido un parámetro no válido en la url (Bad Request).
                * Respuesta:
                    ```json
                    {
                      "beers": [
                        { }
                      ],
                      "status": 400
                    }
                    ```

Para obtener los datos de las recetas se utilizará la API de **PunkApi**.

Los servicios creados serán **RESTful** y tienen como formato de salida **JSON**.

#### Versión Básica

En esta versión nos centramos en el uso básico de **Symfony4**. Usamos el **Controller** como punto de entrada de nuestra aplicación, añadiendo el **routing** mediante **annotation** en el propio Controller.

En este caso, hacemos uso de **Value Objects**.

```js
src
├── Controller
|   ├── BeerController.php
├── ValueObjects
   ├── Beer.php
   ├── BeerDetail.php
```

#### Versión DDD

En esta vesión usamos **Domain Driven Design (DDD)**. 

Para esta versión usamos un **Service Bus**, en nuestro caso **Query Bus**.

```js
src
├── Core
|   ├── Application
|   |   ├── DataTransformer
|   |   |   ├── DataTransformer.php
|   |   ├── Query
|   |   |   ├── V1
|   |   |   |   ├── Beer
|   |   |   |   |   ├── BeerByFood
|   |   |   |   |   |   ├── BeerByFoodQuery.php
|   |   |   |   |   |   ├── BeerByFoodQueryDataTransformer.php
|   |   |   |   |   |   ├── BeerByFoodQueryHandler.php
|   |   |   |   |   |   ├── BeerByFoodQueryResponse.php
|   |   |   |   |   |   ├── BeerByFoodQueryService.php
|   |   |   |   |   ├── BeerDetailById
|   |   |   |   |   |   ├── BeerDetailByIdQuery.php
|   |   |   |   |   |   ├── BeerDetailByIdQueryDataTransformer.php
|   |   |   |   |   |   ├── BeerDetailByIdQueryHandler.php
|   |   |   |   |   |   ├── BeerDetailByIdQueryResponse.php
|   |   |   |   |   |   ├── BeerDetailByIdQueryService.php
|   ├── Domain
|   |   ├── Bus
|   |   |   ├── Query.php
|   |   |   ├── QueryResponse.php
|   |   ├── Model
|   |   |   ├── Beer
|   |   |   |   ├── Beer.php
|   |   |   |   ├── BeerDetail.php
|   |   |   |   ├── BeerRespositoryInterface.php
|   ├── Infraestructure
|   |   ├── Action
|   |   |   ├── V1
|   |   |   |   ├── Beer
|   |   |   |   |   ├── GetBeersByFoodAction.php
|   |   |   |   |   ├── GetBeersDetailByIdAction.php
|   |   |   ├── Repository
|   |   |   |   ├── BeerRepository.php
```