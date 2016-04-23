using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;

namespace WindowsCinema
{
    public partial class ChooseCinema : Form
    {
        public ChooseCinema()
        {
            InitializeComponent();
        }

        private void lb2000_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {
            Login abrir = new Login();
            abrir.ShowDialog();
        }



        private void btSalir_Click(object sender, EventArgs e)
        {
            Close();
        }
    }
}