using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
    public class Pelicula
    {
        #region CAMPOS
        protected string nombre;
        private int duracion; // minutos
        private int intermedios;
        private int sala;
        private DateTime primeraSesion;
        private string foto;
        private bool treintaYCincomm;
        private bool vos;
        private bool tresD;
        private bool vd;
        private bool vo;
        private bool digital;
        private string descripcion;
        private string[] genero;
        private string director;
        private DateTime proyeccion;
        private DateTime finProyeccion;
        private string interpretes;
        private string calificacion;
        private string trailer;
        private string cartel;
        private string rutaFoto;
        private string rutaCartel;
        private int idPelicula;
        #endregion

        #region PROPIEDADES
        public int IdPelicula
        {
            get { return idPelicula; }
            set { idPelicula = value; }
        }
        public string Nombre
        {
            get
            {
                return nombre;
            }
            set
            {
                nombre = value;
            }
        }
        public string Fotos
        {
            get
            {
                return foto;
            }
            set
            {
                foto = value;
            }
        }
        public string Primera
        {
            get
            {
                primeraSesion = DateTime.Parse("17:00");
                return primeraSesion.ToShortTimeString();
            }
        }
        public bool Vd
        {
            get { return vd; }
            set { vd = value;  }
        }
        public bool TresD
        {
            get { return tresD; }
            set {tresD = value; }
        }
        public bool Vos
        {
            get { return vos; }
            set { vos = value; }
        }
        public bool TreintaYCincoMm
        {
            get { return treintaYCincomm; }
            set { treintaYCincomm = value;  }
        }
	    public bool Vo
	    {
		    get { return vo;}
		    set { vo = value;}
	    }
        public int Sala
        {
            get
            {
                return sala;
            }
            set
            {
                sala = value;
            }
        }
        public int DivisionDeTiempo
        {
            get
            {
                double d;
                int resultado = 0;
                int division = 500;
                d = Math.Ceiling((double)division / (double)(Duracion + Intermedio));
                resultado = (int)d;
                return resultado;

            }
        }
        public  string[] Sesion
        {

            get
            {
                string aux="",aux2="";
                string[] sesion = new string[DivisionDeTiempo]; //Numero de sesiones que voy a tener
                TimeSpan sesiones = TimeSpan.Parse(Primera);
                sesion[0] = Primera.ToString();
                for (int i = 1; i < DivisionDeTiempo; i++)
                {
                    sesiones += ConversorDuracion();
                    if (sesiones.Minutes.ToString().Length < 2)
                        aux = sesiones.Minutes + "0";
                    else
                        aux = sesiones.Minutes.ToString();
                    if (sesiones.Hours.ToString().Length < 2)
                        aux2 = "0" + sesiones.Hours.ToString();
                    else
                        aux2 = sesiones.Hours.ToString();
                    sesion[i] =aux2 + ":" + aux; // .ToString().Substring(0, 5);//Añado las sesiones convertidas sin decimales formato 00:00 a sesiones
                }
                return sesion;
            }

        }
        public TimeSpan ConversorDuracion()
        {
                int division = 0;
                division = (Duracion+Intermedio) / 60;
                double d = Math.Ceiling((double)((double)(Duracion+Intermedio) % (double)60) / (double)10);// Redondeo las sesiones a 10, 20, 30, 40, 50
                int min = (int)(10*(d)); 
                TimeSpan s = TimeSpan.FromHours(division) + TimeSpan.FromMinutes(min);
                return s;
        }
        public int Intermedio
        {
            get
            {
                intermedios = 15;
                return intermedios;
            }
        }
        public int Duracion
        {
            get
            {
              return duracion;
            }
            set
            {
                if (value <60)
                    duracion = 60;
                else
                    duracion = value;
            }
        }
        public bool Digital
        {
            get { return digital; }
            set { digital = value; }
        }
        public string[] Genero
        {
            get { return genero; }
            set { genero = value; }
        }
        public string Director
        {
            get { return director; }
            set { director = value; }
        }
        public string Interpretes
        {
            get { return interpretes; }
            set { interpretes = value; }
        }
        public string Cartel
        {
            get { return cartel; }
            set { cartel = value; }
        }
        public string Trailer
        {
            get { return trailer; }
            set { trailer = value; }
        }
        public string Calificacion
        {
            get { return calificacion; }
            set { calificacion = value; }
        }
        public DateTime FinProyeccion
        {
            get { return finProyeccion; }
            set { finProyeccion = value; }
        }
        public DateTime Proyeccion
        {
            get { return proyeccion; }
            set { proyeccion = value; }
        }
        public string Descripcion
        {
            get { return descripcion; }
            set { descripcion = value; }
        }
        public string RutaCartel
        {
            get { return rutaCartel; }
            set { rutaCartel = value; }
        }
        public string RutaFoto
        {
            get { return rutaFoto; }
            set { rutaFoto = value; }
        }

        #endregion

        #region METODOS
        public string generoToString()
        {
            string genero = "";
            for (int i = 0; i < Genero.Length; i++)
            {
                if (i == Genero.Length - 1)
                    genero += Genero[i];
                else
                    genero += Genero[i] + ",";
            }
            return genero;
        }
        public string proyeccionToString()
        {
            return Proyeccion.Year + "-" + Proyeccion.Month + "-" + Proyeccion.Day;
        }
        public string finProyeccionToString()
        {
            return FinProyeccion.Year + "-" + FinProyeccion.Month + "-" + FinProyeccion.Day;
        }
        #endregion

        #region CONSTRUCTOR
        public Pelicula(string nombre, int duracion, int sala, string afoto,
            bool tresd,bool vd,bool t35mm,bool vos, bool vo,bool d,string desc,
            ref string[] gene,string dire,DateTime proyec,DateTime finPro, string inter,string calif,string trai,string cart)
        {
            Nombre = nombre; 
            Duracion = duracion;
            Sala = sala;
            Fotos = afoto;
            TresD = tresd;
            Vd = vd;
            TreintaYCincoMm = t35mm;
            Vos = vos;
            Vo = vo;
            Digital = d;
            Descripcion = desc;
            Genero = gene;
            Director = dire;
            Proyeccion = proyec;
            FinProyeccion = finPro;
            Interpretes = inter;
            Calificacion = calif;
            Trailer = trai;
            Cartel = cart;
        }
        public Pelicula()
        {
            Nombre = "Sin Nombre";
            Duracion = 0;
            Sala = 0;
            Fotos = "c:\\nada.jpg";
            TresD = false;
            Vd = false;
            TreintaYCincoMm = true;
            Vos = true;
            Vo = false;
        }
        #endregion
    }

}
