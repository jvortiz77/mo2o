# API REST M020

Creación de 2 servicios utilizando **Symfony 4**:

* **Servicio 1**:
    * **Descripción**: Servicio que realiza una petición al API de PunkApi y permite buscar en base a una cadena. El campo para filtrar será **food** y devolverá los siguientes datos:
        * id.
        * nombre.
        * descripción.
    * **Versión Basica**
        * Route: /api/beer?food={string}
        * Method: GET
    * **Versión DDD**
        * Route: /api/v1/beer?food={string}
        * Method: GET
* **Servicio 2**: 
    * **Descripción**: Servicio que realiza una petición al API de PunkApi en base a una cadena (se podrán pasar múltiples ids separados por el símbolo |, por ejemplo: 1|2|3) y retorna los datos necesarios para pintar una vista de detalle que indique los datos del servicio anterior, y que además incluya los siguientes datos: 
        * imagen.
        * slogan (tagline).
        * fecha de fabricación (first_brewed).
    * **Versión Básica**
        * Route: /api/beer/detail?id={id}
        * Method: GET
    * **Versión DDD**
        * Route: /api/v1/beer/detail?id={id}
        * Method: GET

Para obtener los datos de las recetas se utilizará la API de **PunkApi**.

Los servicios creados serán **RESTful** y tienen como formato de salida **JSON**.
