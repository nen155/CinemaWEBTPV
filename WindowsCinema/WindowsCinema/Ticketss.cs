using System;
using System.Collections.Generic;
using System.Text;
using MySql.Data.MySqlClient;
using System.Collections;
//using System.Data;
//using System.Data.SqlClient;
//using System.Windows.Forms;

namespace WindowsCinema
{
    public class Ticketss
    {

        #region CAMPOS
        private ArrayList ticketss;
        #endregion

        public Ticket this[int numerito]
        {
            set
            {
                ticketss[numerito] = value;
            }
            get
            {
                return (Ticket)ticketss[numerito];
            }
        }
        public void AñadeTicket(Ticket t)
        {
            ticketss.Add(t);
        }
        public int NumeroTickets()
        {
            return ticketss.Count;
        }
        public ArrayList ListadoTicket(string nombre, string sesion)
        {
            ArrayList lista = new ArrayList();
            foreach (Ticket t in ticketss)
                if ((t.NombrePelicula == nombre) && (t.HoraSesion.Substring(0, 5) == sesion))
                lista.Add(t);
           // return (string[])lista.ToArray(typeof(string));
            return lista;
        }
        public Ticketss()
		{
			ticketss = new ArrayList();
		}
    }
}
