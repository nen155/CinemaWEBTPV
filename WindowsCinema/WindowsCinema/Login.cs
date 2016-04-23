using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace WindowsCinema
{
    public partial class Login : Form
    {
        Empleados emps;
        Main d;
        BaseDatos basedatos;
        static string empleado;
        public Login()
        {
            InitializeComponent();
            basedatos = new BaseDatos();
            try
            {
                basedatos.Conexion.Open();
            }
            catch (Exception e)
            {
                System.Console.WriteLine(e.Message);
            }
            tbClave.PasswordChar = '*';
            emps = basedatos.cargaEmpleados();
        }

        private void btAceptar_Click(object sender, EventArgs e)
        {
            Empleado o = emps.BuscaEmpleadoLogin(tbUsuario.Text);
            if (o!=null)
            {
                if (o.Clave == tbClave.Text)
                {
                    empleado = tbUsuario.Text;
                    basedatos.FicharEntrada(empleado);
                    basedatos.Conexion.Close();
                    d = new Main();
                    d.TopMost = true;
                    d.Show();
                    this.TopMost = false;
                    this.Close();
                    tbUsuario.Text = "";
                    tbClave.Text = "";
                }
            }
            else
            {
                MessageBox.Show("Usuario o clave incorrectos");
                tbClave.Text = "";
            }
        }
        public static string Usuario()
        {
            return empleado;
        }
    }
}
