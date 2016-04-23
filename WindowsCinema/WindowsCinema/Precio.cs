using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
    class Precio
    {
        #region CAMPOS
        private float miercoles;
        private float especial;
        private float vd;
        private float tresD;
        private float gafas;
        private float iva;
        private float precioBase;
        #endregion

        #region PROPIEDADES
        public float Miercoles
        {
            get { return miercoles; }
            set { miercoles = value; }
        }
        public float Especial
        {
            get { return especial; }
            set { especial = value; }
        }
        public float Vd
        {
            get { return vd; }
            set { vd = value; }
        }
        public float TresD
        {
            get { return tresD; }
            set { tresD = value; }
        }
        public float Gafas
        {
            get { return gafas; }
            set { gafas = value; }
        }
        public float Iva
        {
            get { return Math.Abs(iva); }
            set { iva = value; }
        }
        public float PrecioBase
        {
            get { return Math.Abs(precioBase); }
            set { precioBase = value; }
        } 
        #endregion

        #region CONSTRUCTOR
        public Precio()
        {
        }
        public Precio(float mie, float esp, float vd, float tresd, float gaf, float iva, float pb)
        {
            Miercoles = mie;
            Especial = esp;
            Vd = vd;
            TresD = tresd;
            Gafas = gaf;
            Iva = iva;
            PrecioBase = pb;
        } 
        #endregion

    }
}
