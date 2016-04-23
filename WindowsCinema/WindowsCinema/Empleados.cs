using System;
using System.Collections.Generic;
using System.Text;
using System.Collections;

namespace WindowsCinema
{
    class Empleados
    {
        private ArrayList empleados;

        public bool AñadeEmpleado(Empleado e)
        {
            bool esta=false;
            foreach (Empleado j in empleados)
            {
                if (j.Dni == e.Dni || j.Login == e.Login)
                    esta = true;
            }
            if (!esta)
                empleados.Add(e);
           
            return esta;
        }
        public bool EliminaEmpleado(string dni)
        {
            bool eli = false;
            Empleado esta = BuscaEmpleado(dni);
            if (esta != null)
            {
                empleados.Remove(esta);
                eli = true;
            }
            return eli;

        }
        public Empleado BuscaEmpleado(string dni)
        {
            Empleado j = null;
            foreach (Empleado e in empleados)
                if (dni == e.Dni)
                    j = e;
            return j;
        }
        public Empleado BuscaEmpleadoLogin(string login)
        {
            Empleado j = null;
            foreach (Empleado e in empleados)
                if (login == e.Login)
                    j = e;
            return j;
        }
        public bool EditaEmpleado(string dni,string nombre,string apellidos,string login,string clave)
        {
            bool mod = false;
            Empleado esta = BuscaEmpleado(dni);
            if (esta!=null)
            {
                esta.Login = login;
                esta.Nombre = nombre;
                esta.Apellidos = apellidos;
                esta.Clave = clave;
                mod = true;
            }
            return mod;
        }
        public Empleados()
        {
            empleados = new ArrayList();
        }
    }
}
