using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
    static class Fichar
    {
        #region CAMPOS
        private static DateTime ficharEntrada;
        private static DateTime ficharSalida; 
        #endregion

        #region PROPIEDADES
        public static DateTime FicharEntrada
        {
            get { return ficharEntrada; }
            set { ficharEntrada = value; }
        }
        public static DateTime FicharSalida
        {
            get { return ficharSalida; }
            set { ficharSalida = value; }
        } 
        #endregion
    }
}
