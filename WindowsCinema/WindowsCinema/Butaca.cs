using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
    class Butaca
    {
        private DateTime Sesiones;
        private int fila;
        private int columna;
        private int[,] filaColumna;
        public int Fila
        {
            get { return fila; }
            set { fila = value; }
        }

        public int Columna
        {
            get { return columna; }
            set { columna = value; }
        }
        public Butaca(int fila, int columna)
        {
            Fila = fila;
            Columna = columna;
        }
        public Butaca()
        {
            Fila = 0;
            Columna = 0;
        }

    }
}
