using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
    public class Ticket
    {
        #region CAMPOS
        private string nombre;
        private int numeroTicket;
        private int fila;
        private int columna;
        private DateTime fechaExpedicion;
        private string loginFichar;
        private string tipoExpedicion;
        private string tipoCobro;
        private DateTime fechaSesion;
        private DateTime horaSesion;
        private int idPelicula;
        private int salaProyeccion;
        private float precioTotal;
        private int comprobado;
        private int compra;
        #endregion

        #region PROPIEDADES
        public string TipoExpedicion
        {
            get { return tipoExpedicion; }
            set { tipoExpedicion = value; }
        }
        public string TipoCobro
        {
            get { return tipoCobro; }
            set { tipoCobro = value; }
        }
        public String FechaSesion
        {
            get { return fechaSesion.ToShortDateString(); }
            set { fechaSesion = DateTime.Parse(value); }
        }
        public String HoraSesion
        {
            get { return horaSesion.TimeOfDay.ToString().Substring(0, 5); }
            set { horaSesion = DateTime.Parse(value); }
        }
        public int IdPelicula
        {
            get { return idPelicula; }
            set { idPelicula = value; }
        }
        public int SalaProyeccion
        {
            get { return salaProyeccion; }
            set { salaProyeccion = value; }
        }
        public float PrecioTotal
        {
            get { return precioTotal; }
            set { precioTotal = value; }
        }
        public int Comprobado
        {
            get { return comprobado; }
            set { comprobado = value; }
        }
        public string LoginFichar
        {
            get { return loginFichar; }
            set { loginFichar = value; }
        }
        public string NombrePelicula
        {
            get { return nombre; }
            set { nombre = value; }
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
        public DateTime FechaExpedicion
        {
            get { return fechaExpedicion; }
            set { fechaExpedicion = value; }
        }
        public int NumeroTicket
        {
            get { return numeroTicket; }
            set { numeroTicket = value; }
        }


        public int Compra
        {
            get { return compra; }
            set { compra = value; }
        }
        

        #endregion

        #region METODOS
        public string fechaExpedicionToString()
        {
            return FechaExpedicion.Year + "-" + FechaExpedicion.Month + "-" + FechaExpedicion.Day;
        }
        public string fechaSesionToString()
        {
            return fechaSesion.Year + "-" + fechaSesion.Month + "-" + fechaSesion.Day;
        }
        public string horaSesionToString()
        {
            return fechaSesion.Year + "-" + fechaSesion.Month + "-" + fechaSesion.Day+" " + HoraSesion;
        }
        public new string ToString()
        {
            return
                string.Format("{0,7:d} ", this.NumeroTicket +
                    " / " + this.NombrePelicula +
                    " - " + this.HoraSesion +
                    " - " + this.SalaProyeccion +
                    " - " + this.Fila.ToString() +
                    " - " + this.Columna.ToString() +
                    " - " + this.PrecioTotal
                    );
        }
        public string[] MuestraTicket
        {
            get
            {
                string[] ticket = new string[11];
                ticket[0] = "Numero de Ticket :  " + NumeroTicket;
                ticket[1] = "-----------------------";
                ticket[2] = "Pelicula : " + NombrePelicula;
                ticket[3] = "-----------------------";
                ticket[4] = "Sala : " + SalaProyeccion;
                ticket[5] = "-----------------------";
                ticket[6] = "Sesion : " + HoraSesion.Substring(0, 5);
                ticket[7] = "-----------------------";
                ticket[8] = "Fecha Sesion : " + FechaSesion;
                ticket[9] = "Fila : " + Fila;
                ticket[10] = "Butaca : " + Columna;
                return ticket;

            }
        } 
        #endregion

        #region CONSTRUCTOR
        public Ticket(int fila, int columna, string nombre, string tipoex, string tipoco, DateTime horaSes, int sala, float total, string logficha, int comp)
        {
            Fila = fila;
            Columna = columna;
            NombrePelicula = nombre;
            FechaExpedicion = DateTime.Now;
            FechaSesion = DateTime.Now.ToString();
            TipoExpedicion = tipoex;
            TipoCobro = tipoco;
            HoraSesion = horaSes.TimeOfDay.ToString();
            SalaProyeccion = sala;
            PrecioTotal = total;
            LoginFichar = logficha;
            Compra = comp;
        }
        public Ticket()
        {
            Fila = 0;
            Columna = 0;
            NombrePelicula = "";
            FechaExpedicion = DateTime.Now;
            FechaSesion = DateTime.Now.ToString();
        } 
        #endregion
    }
}
