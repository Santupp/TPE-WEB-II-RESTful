# TPE WEB II
## Base de datos orientada a peliculas
### Integrantes:
* Santino Monniello (A)
* Martín Lospinoso (B)

### Descripción del proyecto:
Base de datos orientada a peliculas, el objetivo de este proyecto es una aplicación que nos permita ver la información de las películas de interés, brindándonos información acerca del director, la fecha de estreno y género.

---

<div style="display: flex; align-items: center;">
  <img src="https://github.com/user-attachments/assets/aec7388f-17f3-436f-b766-3b3dfb004709" alt="image" style="margin-right: 10px;"/>
  <div style="border-left: 2px solid slategray; height: 300px; margin-left: 10px;"></div>
</div>

La tabla director está vinculada con la tabla películas a través de una clave foranea que apunta desde peliculas a director (id_director -> director(id)). Si se elimina el director las peliculas del mismo también se veran afectadas.
