using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace WindowsCinema
{
    public partial class Form3 : Form
    {
        Peliculas peli;
        public Form3()
        {
            InitializeComponent();
            peli = new Peliculas();
        }
        private void borraUno()
        {

                peli.BorrarPelicula(Int32.Parse(textBox3.Text));
        }
        private void Form3_Load(object sender, EventArgs e)
        {

        }
    }
}