using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
    public class Tickets
    {
        private string nombre;
        private string sesion;
        private int numeroTickets;
        private int fila;
        private int columna;
        private Tickets[,] ticket;
        public Tickets this[int fila, int columna]
        {
            get
            {
                return ticket[fila,columna];
            }
            set
            {
                ticket[fila,columna] = value;
            }
        }
        public void RellenaFilaColumna()
        {
            for (int c = Columna; c < ticket.Length; c++)
            {
                for (int f = Fila; f < ticket.Length; f++)
                {
                    ticket[f,c] = new Tickets(Nombre,Sesion);
                }
            }
        }
        public string Nombre
        {
            get { return nombre; }
            set { nombre = value;}
        }
        public string Sesion
        {
            get{ return sesion; }
            set{ sesion = value; }
        }
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
        public Tickets(string nombre, string sesion)
        {
            Fila = fila;
            Columna = columna;
            Nombre = nombre;
            Sesion = sesion;
            ticket = new Tickets[10, 10];

        }
        public Tickets()
        {
            ticket = new Tickets[10, 10];
            Fila = 0;
            Sesion = "";
            Columna = 0;
            Nombre = "";
        }
    }
}
