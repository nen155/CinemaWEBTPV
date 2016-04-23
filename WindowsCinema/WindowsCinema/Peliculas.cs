using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
   public class Peliculas
    {
       private Pelicula[] peliculas;

       public Pelicula this[int numerito]
       {
           set
           {
               peliculas[numerito] = value;
           }
           get
           {
               return (Pelicula)peliculas[numerito];
           }
       }
        public void ActualizaPelicula(ref Pelicula pelicula, int posicion)
        {
            peliculas[posicion] = pelicula;
        }
        public Peliculas()
        {
            peliculas = new Pelicula[8];
        }
    }
}
