# TPE WEB II
## API REST orientada a películas 
### Integrantes:
* Santino Monniello (A)
* Martín Lospinoso (B)

### Descripción del proyecto:
API REST que permite la gestión de películas y directores. Se pueden listar todas las películas, listar una película por ID, ordenar las películas por orden ascendente o descendente, actualizar una película, eliminar una película y agregar una película.

--- 

## Usuarios predefinidos
### Administrador
* username: admin
* email: admin
* password: admin
* rol: admin

### Usuario
* username: santino
* email: santino.monniello@gmail.com
* password: monniello
* rol: user

---
## Acceder a la API REST luego de la implementación del JWT
### Autenticación con Postman

### Pasos para obtener y usar el token JWT:

1. Dirigite a la pestaña **Authorization** y seleccioná "Basic Auth".
2. Introducí el **correo electrónico** y la **contraseña** del usuario que deseas autenticar.
3. Realizá una solicitud `GET` al endpoint:
   ```
   /localhost/TPE-WEB-II-RESTful/api/usuarios/token
   ```
4. El cuerpo de la respuesta contendrá un **JWT token**.
5. Cambiá el tipo de **Authorization** a "Bearer Token".
6. Introducí el token recibido (sin incluir comillas).

### Consideraciones:

- Mientras el token esté configurado, las credenciales de usuario estarán activas.
- Solo los usuarios con permisos de **administrador** pueden realizar solicitudes `POST`, `PATCH` y `DELETE`.
- El token tiene una duración de **una hora**.


## ENDPOINTS
* GET api/peliculas
* GET api/peliculas/:id 
* GET api/peliculas?orderBy=desc//asc <- Ordena las peliculas por orden asc o desc
* PUT api/peliculas/:id 
* DELETE api/peliculas/:id
* POST api/peliculas

* GET api/directores
* GET api/directores/:id 
* GET api/directores?orderBy=desc//asc <- Ordena las peliculas por orden asc o desc
* PUT api/directores/:id 
* DELETE api/directores/:id
* POST api/directores


---

### Listar películas - GET api/peliculas

**Descripción**:  
Devuelve la lista de todas las películas.

```http
GET /peliculas
```

**Ejemplo de respuesta**:
```json
[
  {
    "id": "19",
    "nombre": "Interstellar",
    "fecha_estreno": "2016-11-06",
    "genero": "sci-fi",
    "descripcion": "Interstellar es una película de ciencia ficción de 2014 dirigida por Christopher Nolan que narra la historia de un grupo de exploradores que viajan al espacio para buscar planetas habitables y salvar a la humanidad de la degradación ambiental",
    "imagen": "images/6713fbb667f9f9.67956188.jpg",
    "id_director": "23"
  },
  {
    "id": "24",
    "nombre": "El padrino",
    "fecha_estreno": "1972-09-20",
    "genero": "Crimen",
    "descripcion": "El padrino es una película de 1972 dirigida por Francis Ford Coppola que cuenta la historia de la familia Corleone, una de las familias mafiosas más poderosas de Nueva York en los años 40",
    "imagen": "images/6714203f236768.06073882.jpg",
    "id_director": "24"
  }
]
```

---

### Listar película por ID - GET api/peliculas/:id

**Descripción**:  
Devuelve los detalles de una película específica según su ID.

```http
GET api/peliculas/:id
```

**Parámetros de URL**:
- `:id` (integer): ID de la película que se desea obtener.

**Ejemplo de respuesta**:
```json
{
  "id": "24",
  "nombre": "El padrino",
  "fecha_estreno": "1972-09-20",
  "genero": "Crimen",
  "descripcion": "El padrino es una película de 1972 dirigida por Francis Ford Coppola que cuenta la historia de la familia Corleone, una de las familias mafiosas más poderosas de Nueva York en los años 40",
  "imagen": "images/6714203f236768.06073882.jpg",
  "id_director": "24"
}
```

---

### Ordenar películas - GET api/peliculas?orderBy=campo&order=asc|desc

**Descripción**:  
Devuelve la lista de películas ordenadas según los parámetros `orderBy` y `order`.

```http
GET api/peliculas?orderBy=campo&order=asc|desc
```

**Parámetros de Query**:
  - `orderBy` (string): Campo por el cual se ordenarán las películas. Ejemplos de campos válidos: `id, nombre, fecha_estreno, genero, descripcion, director`.
  - `order` (string): Define el orden de las películas:
      - `asc`: Orden ascendente.
      - `desc`: Orden descendente.

### Ejemplo 1: Ordenar por `nombre` en Orden Ascendente
```
/peliculas?orderBy=nombre&order=asc
```

### Ejemplo 2: Ordenar por `nombre` en Orden Descendente
```
/peliculas?orderBy=nombre&order=desc
```

### Ejemplo 3: Ordenar por `fecha_estreno` en Orden Ascendente
```
/peliculas?orderBy=fecha_estreno&order=asc
```

### Ejemplo 4: Ordenar por `fecha_estreno` en Orden Descendente
```
/peliculas?orderBy=fecha_estreno&order=desc
```

### Ejemplo 5: Ordenar por `genero` en Orden Ascendente
```
/peliculas?orderBy=genero&order=asc
```

---

### Actualizar una película - PUT api/peliculas/:id

**Descripción**:  
Actualiza los datos de una película específica según su ID.

```http
PUT api/peliculas/:id
```

**Parámetros de URL**:
- `:id` (integer): ID de la película que se desea actualizar.

**Cuerpo de la solicitud** (JSON):
```json
{
  "titulo": "Nuevo título",
  "director": "Nuevo director",
  "año": 2022
}
```

**Ejemplo de respuesta**:
```json
{
  "mensaje": "Película actualizada correctamente."
}
```

---

### Eliminar una película - DELETE api/peliculas/:id

**Descripción**:  
Elimina una película específica según su ID.

```http
DELETE api/peliculas/:id
```

**Parámetros de URL**:
- `:id` (integer): ID de la película que se desea eliminar.

**Ejemplo de respuesta**:
```json
{
  "mensaje": "La tarea con el id=$id se eliminó con éxito"
}
```

### Agregar una película - POST api/peliculas

**Descripción**:  
Agrega una nueva película.

```http
POST api/peliculas
```

**Cuerpo de la solicitud** (JSON):
```json
{
  "nombre": "string",
  "fecha_estreno": "string",
  "genero": "string",
  "descripcion": "string",
  "director": "integer"
}
```

**Ejemplo de respuesta**:
```json
{
  "mensaje": "La película se agregó con éxito"
}
```
---


La tabla director está vinculada con la tabla películas a través de una clave foranea que apunta desde peliculas a director (id_director -> director(id)). Si se elimina el director las peliculas del mismo también se veran afectadas.
