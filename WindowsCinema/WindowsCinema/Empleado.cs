using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
    class Empleado
    {
        #region Campos
        private string login;
        private string clave;
        private string nombre;
        private string apellidos;
        private DateTime ficharSalida;
        private DateTime ficharEntrada;
        private string dni;
        #endregion

        #region Propiedades
        public DateTime FicharEntrada
        {
            get { return ficharEntrada; }
            set { ficharEntrada = value; }
        }
        public DateTime FicharSalida
        {
            get { return ficharSalida; }
            set { ficharSalida = value; }
        }
        public string Apellidos
        {
            get { return apellidos; }
            set { apellidos = value; }
        }
        public string Nombre
        {
            get { return nombre; }
            set { nombre = value; }
        }
        public string Clave
        {
            get { return clave; }
            set { clave = value; }
        }

        public string Dni
        {
            get { return dni; }
            set { dni = value; }
        }
        
        public string Login
        {
            get { return login; }
            set { login = value; }
        }
        #endregion

        #region CONSTRUCTOR
        public Empleado(string log, string cl, string nom, string ape, string dni)
        {
            Login = log;
            Clave = cl;
            Nombre = nom;
            Apellidos = ape;
            Dni = dni;
        }
        public Empleado()
        {
        } 
        #endregion
    }
}
