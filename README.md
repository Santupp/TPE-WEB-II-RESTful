# TPE WEB II
## Base de datos orientada a peliculas
### Integrantes:
* Santino Monniello (A)
* Martín Lospinoso (B)

### Descripción del proyecto:
Base de datos orientada a peliculas, el objetivo de este proyecto es una aplicación que nos permita ver la información de las películas de interés, brindándonos información acerca del director, la fecha de estreno y género.

---

<img src="https://github.com/user-attachments/assets/aec7388f-17f3-436f-b766-3b3dfb004709">  
--- 

## ENDPOINTS
* GET /peliculas
* GET /peliculas/:id 
* GET /peliculas?orderBy=desc//asc <- Ordena las peliculas por orden asc o desc
* PUT /peliculas/:id 
* DELETE /peliculas/:id
* POST /peliculas


---

### Listar películas - GET /peliculas

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

### Listar película por ID - GET /peliculas/:id

**Descripción**:  
Devuelve los detalles de una película específica según su ID.

```http
GET /peliculas/:id
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

### Ordenar películas - GET /peliculas?orderBy=desc|asc

**Descripción**:  
Devuelve la lista de películas ordenadas según el parámetro `orderBy`.

```http
GET /peliculas?orderBy=desc|asc
```

**Parámetros de Query**:
- `orderBy` (string): Define el orden de las películas:
    - `asc`: Orden ascendente.
    - `desc`: Orden descendente.

**Ejemplo de respuesta**:
```json
[
  {
    "id": 2,
    "titulo": "The Matrix",
    "director": "Lana Wachowski, Lilly Wachowski",
    "año": 1999
  },
  {
    "id": 1,
    "titulo": "Inception",
    "director": "Christopher Nolan",
    "año": 2010
  }
]
```

---

### Actualizar una película - PUT /peliculas/:id

**Descripción**:  
Actualiza los datos de una película específica según su ID.

```http
PUT /peliculas/:id
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

### Eliminar una película - DELETE /peliculas/:id

**Descripción**:  
Elimina una película específica según su ID.

```http
DELETE /peliculas/:id
```

**Parámetros de URL**:
- `:id` (integer): ID de la película que se desea eliminar.

**Ejemplo de respuesta**:
```json
{
  "mensaje": "La tarea con el id=$id se eliminó con éxito"
}
```

### Agregar una película - POST /peliculas

**Descripción**:  
Agrega una nueva película.

```http
POST /peliculas
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
