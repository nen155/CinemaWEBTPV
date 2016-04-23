using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Text;
using System.Windows.Forms;
using MySql.Data.MySqlClient;
using System.Collections;
using System.Timers;
using System.IO;
using System.Drawing.Imaging;
using System.Net;

namespace WindowsCinema
{
    public partial class Main : Form
    {
        #region Campos
        //Inicializa clases
        Ticketss tickets;
        Peliculas misPeliculas;
        BaseDatos basedatos;
        Pelicula pelicula;
        Ticket ticket;
        Compra comp;
        Precio precio;
        Empleados empleados;
        ArrayList precios;
        string nombre;
        string sesion;
        string tipoCobro;
        int numeroTicket=1;
        int numeroSala;
        float individual;
        float individualIVA;
        int butacasReservadas=0;
        int butacasAnt = 0;
        int compra = 0;
        public static Ticketss asigna;
        

        //posicion del putoRaton
        int ratonX;
        int ratonY;
        int columnaActual;

        //boton de borrar anterior
        Button anterior=null;
        //PictureBox anterior
        PictureBox pbAnterior=null;

        // tamaños y desplazamientos
        int ox = 450;
        int desp = 22;
        int oy = 245;
        int tamaño = 21;
        int butacas=24;
        int filas=14;
        int esquinaInferiorX;
        int esquinaInferiorY;
        
        //grafico
        Graphics grafico;

        //la tabla
        int[,] tablilla; 

        //iconos
        Icon IconoBueno;
        Icon IconoRegular;
        Icon IconoMalo;

        #endregion

        #region Formulario

        public Main()
        {
            try
            {
                IconoBueno = new Icon(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"..\Datos\IconoLibre.ico"));
                IconoRegular = new Icon(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"..\Datos\IconoElegido.ico"));
                IconoMalo = new Icon(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"..\Datos\IconoVendido.ico"));
            }
            catch { }
            InitializeComponent();
            if (Login.Usuario() != "admin")
            {
                tabControl1.TabPages.Remove(tabPage2);
                tabControl1.TabPages.Remove(tabPage3);
                tabControl1.TabPages.Remove(tabPage4);
            }
            else
            {
                if (tabControl1.TabPages.Count == 1)
                {
                    tabControl1.TabPages.Add(tabPage2);
                    tabControl1.TabPages.Add(tabPage3);
                    tabControl1.TabPages.Add(tabPage4);
                }
            }
            basedatos = new BaseDatos();
            lbEmpleado.Text = Login.Usuario();
            tablilla = new int[filas, butacas]; 
            tickets = new Ticketss();
            misPeliculas = new Peliculas();
            pelicula = new Pelicula();
            precio = new Precio(-1, -1, 1, 2, 0.5f, 0.18f, 4.25f);
            precios = new ArrayList();
            comp = new Compra();
            empleados = new Empleados();
            individualIVA = precio.PrecioBase + (precio.PrecioBase * precio.Iva);
            individual = individualIVA;
            grafico = tabPage1.CreateGraphics();
            esquinaInferiorX=  ox + (tamaño * butacas) + tamaño;
            esquinaInferiorY = oy + (tamaño * filas) + tamaño;
        }

        private void btSalir_Click(object sender, EventArgs e)
        {
            Close();
        }

        private void Form2_Load(object sender, EventArgs e)
        {
            basedatos.abreConexion();
            basedatos.primerPrecio(precio);
            empleados = basedatos.cargaEmpleados();
            basedatos.cargaPeliculas(ref misPeliculas);
            tickets = basedatos.cargaTickets();
            if(tickets.NumeroTickets()>0)
                compra = tickets[tickets.NumeroTickets() - 1].Compra;
            comp.añadeCompra(tickets);
            ActualizaPeliculasForm();
        }
        private void Form2_FormClosing(object sender, FormClosingEventArgs e)
        {
            basedatos.FicharSalida(lbEmpleado.Text);
        }
        private void tabPage2_Click(object sender, EventArgs e)
        {
            btAdminActualizar.Enabled = false;
            btAñadirPeliculas.Enabled = true;
        }
        
        #endregion

        #region Metodos Taquilla

        private void dibujarIconosButacas(int x, int y, int t, int onOffRegular)
        {
            Icon ico;
            if (onOffRegular == 1)
                ico = IconoBueno;
            else
                if (onOffRegular == 0)
                    ico = IconoRegular;
                else
                    if (onOffRegular == -1)
                        ico = IconoMalo;
                    else
                        ico = IconoBueno;
            grafico.DrawIcon(ico,new Rectangle(x,y,t,t));
        }

        private void dibujaTablilla()
        {
            int origeny=0;
            int origenx=0;
            Label l;
            int iniLabel;
            for (int fila = 0; fila < filas; fila++)
            {
                for (int columna = 0; columna < butacas; columna++)
                {
                    origenx = ox + columna * desp;
                    origeny = (esquinaInferiorY - tamaño) - desp * fila;
                    dibujarIconosButacas(origenx, origeny, tamaño, tablilla[fila, columna]);
                    if (fila == filas-1)
                    {
                        l = new Label();
                        l.Text = (columna + 1).ToString();
                        l.AutoSize = true;
                        l.Location = new Point(origenx, origeny-22);
                        tabPage1.Controls.Add(l);
                    }
                }
                iniLabel = ox - 20;
                l = new Label();
                l.Text = (fila+1).ToString();
                l.AutoSize = true;
                l.Location = new Point(iniLabel, origeny);
                tabPage1.Controls.Add(l);
            }
        }

        private int fila(int y)
        {
            return (((y - oy) / desp) + 1);
        }

        private int filaMuestra(int y)
        {
            return ((esquinaInferiorY - y)/desp)+1;
        }

        private int columna(int x)
        {
            return (((x - ox) / desp) + 1);
        }

        private void cambioSesion(int indice)
        {
            try
            {
                    for (int i = 0; i < misPeliculas[indice].DivisionDeTiempo; i++)
                    {
                        if (lbSesiones.Items != null)
                            lbSesiones.Items.Clear();

                    }
                    for (int i = 0; i < misPeliculas[indice].DivisionDeTiempo; i++)
                        lbSesiones.Items.Add(misPeliculas[indice].Sesion[i]+"\t\t"+"-"+"\t\t"+ ((butacas*filas)-tickets.ListadoTicket(misPeliculas[indice].Nombre,misPeliculas[indice].Sesion[i]).Count));
            }
            catch
            {
                MessageBox.Show("La pelicula ha sido eliminada");
            }
        }

        private void rellenaDataGrid(string nombre, string sesion)
        {
            dgvReserva.Rows.Clear();
            foreach (Ticket t in tickets.ListadoTicket(nombre, sesion))
                dgvReserva.Rows.Add(t.Compra,t.NumeroTicket, t.NombrePelicula, t.SalaProyeccion, t.HoraSesion.Substring(0, 5), t.FechaSesion, t.Fila, t.Columna,Math.Round(t.PrecioTotal,1),t.LoginFichar,"cash");
        }

        private void limpiarTablilla()
        {
            for (int i = 0; i < tablilla.GetLength(0); i++)
            {
                for (int j = 0; j < tablilla.GetLength(1); j++)
                {
                    tablilla[i, j] = 0;
                }
            }
        }

        private void actualizaPrecio()
        {
            float temp = individual;
            if (cbMiercoles.Checked)
                lbEntraIndividual.Text = Math.Round((temp+precio.Miercoles),1) + "€";
            else
                lbEntraIndividual.Text = Math.Round(individual,1) + "€";
        }

        private void rellenaPrecios()
        {
            int i = 0, j = butacasAnt,h=0;
            if (!cbMiercoles.Checked)
                while (i < butacasReservadas)
                {
                    while (i < nudEspecial.Value)
                    {
                        precios.Add(individual + precio.Especial);
                        i++;
                    }
                    precios.Add(individual);
                    i++;

                }
            else
                while (i < butacasReservadas)
                {
                    precios.Add(individual + precio.Miercoles);
                    i++;
                }
            while (h < nudGafas.Value)
            {
                precios[j] = (float)precios[j] + precio.Gafas;
                j++;
                h++;
            }
            butacasAnt = precios.Count;
        }

        private void chequeaPeli()
        {
            tbVerTicket.Text = "";
            dgvReserva.Rows.Clear();
            limpiarTablilla();
            limpiaChecked();
            sesion = null;
            grafico.Clear(Color.WhiteSmoke);
            if (pelicula.TresD)
                individual += precio.TresD;
            else if (pelicula.Vd)
                individual += precio.Vd;
            else if (pelicula.TreintaYCincoMm)
                individual = individualIVA;
            if (!pelicula.TresD)
                nudGafas.Enabled = false;
            else
                nudGafas.Enabled = true;
            if (DateTime.Now.DayOfWeek.ToString() == "Wednesday")
                cbMiercoles.Enabled = true;
            nudEspecial.Enabled = true;
            
        }

        private void limpiaChecked()
        {
            nudGafas.Value = 0;
            nudEspecial.Value = 0;
            butacasReservadas = 0;
        }

        private void RecorreTickets(string nombre, string sesion)
        {
            limpiarTablilla();
            try
            {
                for (int i = 0; i < tickets.NumeroTickets(); i++)
                    if (tickets[i].NombrePelicula == nombre && tickets[i].HoraSesion.Substring(0, 5) == sesion)
                        tablilla[tickets[i].Fila - 1, tickets[i].Columna - 1] = -1;
            }
            catch
            {
                MessageBox.Show("No hay tickets");
            }
            dibujaTablilla();
        }

        private void imprimeCompra()
        {
            for (int i = 0; i < tickets.NumeroTickets(); i++)
            {
                if (tickets[i].NombrePelicula == nombre && tickets[i].HoraSesion == sesion && tickets[i].NumeroTicket == Int32.Parse(dgvReserva.Rows[dgvReserva.SelectedRows[0].Index].Cells[1].Value.ToString()))
                {
                    ticket = tickets[i];
                    tbVerTicket.Lines = comp.MuestraCompra(tickets[i].Compra);
                }
            }
        }

        private void seleccionaFilaCompra(Ticketss temp)
        {
            for (int i = 0; i < dgvReserva.Rows.Count; i++)
            {
                dgvReserva.Rows[i].Selected = false;
                for (int j = 0; j < temp.NumeroTickets(); j++)
                    if (Int32.Parse(dgvReserva.Rows[i].Cells[0].Value.ToString()) == temp[j].Compra)
                        dgvReserva.Rows[i].Selected = true;
            }
        }

        #endregion

        #region Eventos Taquilla

        private void pbTaquilla_Click(object sender, EventArgs e)
        {
            try
            {
                individual = individualIVA;
                if (pbAnterior != null)
                    pbAnterior.BorderStyle = BorderStyle.None;
                PictureBox pb = ((PictureBox)sender);
                numeroSala = Int32.Parse(pb.Name[pb.Name.Length - 1].ToString());
                if (pb.Image == pbVacia.Image)
                    lbSesiones.Items.Clear();
                cambioSesion(numeroSala);
                pelicula = misPeliculas[numeroSala];
                pb.BorderStyle = BorderStyle.FixedSingle;
                pbAnterior = pb;
                chequeaPeli();
                actualizaPrecio();
            }catch
            {}
        }

        private void lbSesiones_SelectedIndexChanged(object sender, EventArgs e)
        {
            if (lbSesiones.SelectedItem != null)
            {
                tickets = basedatos.cargaTickets();
                sesion = lbSesiones.SelectedItem.ToString().Substring(0, 5); 
                nombre = pelicula.Nombre;
                actualizaPrecio();
                rellenaDataGrid(pelicula.Nombre, sesion);
                try
                {
                    RecorreTickets(nombre, sesion);
                }
                catch
                {
                    MessageBox.Show("No hay tickets guardados");
                }
            }
        }

        private void Form2_MouseMove(object sender, MouseEventArgs e)
        {
            if (sesion != null)
            {
                ratonX = e.X;
                ratonY = e.Y;

                if (ratonX < ox - 1 || ratonX > esquinaInferiorX || ratonY < oy - 1 || ratonY > esquinaInferiorY)
                {
                    lbFila.Text = "0";
                    lbColumna.Text = "0";
                }
                else
                {
                    lbColumna.Text = columna(e.X).ToString();
                    lbFila.Text = filaMuestra(e.Y).ToString();
                }
            }


        } 

        private void Form2_MouseClick(object sender, MouseEventArgs e)
        {
            if (sesion != null)
            {
                columnaActual = columna(ratonX) - 1;
                int fil = filaMuestra(ratonY) - 1;

                if (fil >= 0 && fil <= filas && columnaActual >= 0 && columnaActual <= butacas)
                {
                    try
                    {
                        if (tablilla[fil, columnaActual] == 0)
                        {
                            tablilla[fil, columnaActual] = 1;
                            butacasReservadas++;
                        }
                        else
                            if (tablilla[fil, columnaActual] == 1)
                            {
                                tablilla[fil, columnaActual] = 0;
                                butacasReservadas--;
                            }
                    }
                    catch
                    {
                        MessageBox.Show("Estas fuera del rango");
                    }
                    
                    dibujaTablilla();
                    actualizaPrecio();
                }

            }
        }

        private void btReservar_Click(object sender, EventArgs e)
        {
            bool reservado = false;
            Ticketss temp = new Ticketss();
            rellenaPrecios();
            compra++;
            for (int f = 0; f <filas; f++)
            {
                for (int c = 0; c < butacas; c++)
                {
                    if (tablilla[f, c] == 1)
                    {
                        if (!basedatos.compruebaTicket(f + 1, c + 1, DateTime.Parse(sesion),DateTime.Now,DateTime.Now,numeroSala+1,pelicula.IdPelicula))
                        {
                            Ticket t = new Ticket(f + 1, c + 1, pelicula.Nombre, "taquilla", tipoCobro, DateTime.Parse(sesion), numeroSala + 1, (float)precios[numeroTicket - 1], Login.Usuario(), compra);
                            t.IdPelicula = pelicula.IdPelicula;
                            t.NumeroTicket = numeroTicket++;
                            tickets.AñadeTicket(t);
                            temp.AñadeTicket(t);
                            basedatos.Inserta(t);
                            tablilla[f, c] = -1;
                        }
                        else
                        {
                            reservado = true;
                            tickets = basedatos.cargaTickets();
                            MessageBox.Show("Las entradas ya han sido reservadas");
                        } 
                    }
                }
            }
            if (!reservado)
            {
                comp.añadeCompra(temp);
                dibujaTablilla();
                rellenaDataGrid(pelicula.Nombre, sesion);
                seleccionaFilaCompra(temp);
                cambioSesion(numeroSala);
                imprimeCompra();
                limpiaChecked();
            }
            else
                compra--;
        }

        private void dgvReserva_CellClick(object sender, DataGridViewCellEventArgs e)
        {
            try
            {
                dgvReserva.CurrentRow.Selected = true;
                imprimeCompra();
            }
            catch
            { }
        }

        private void cbMiercoles_CheckedChanged(object sender, EventArgs e)
        {
            if (cbMiercoles.Checked)
            {
                actualizaPrecio();
                nudEspecial.Enabled = false;
            }
            else
            {
                actualizaPrecio();
                nudEspecial.Enabled = true;
            }
        }

        private void nudGafas_ValueChanged(object sender, EventArgs e)
        {
            if (nudGafas.Value > butacasReservadas)
                nudGafas.Value = butacasReservadas;     
        }

        private void nudEspecial_ValueChanged(object sender, EventArgs e)
        {
            if (nudEspecial.Value > butacasReservadas)
                nudEspecial.Value = butacasReservadas;    
        }
   
        #endregion

        #region Metodos Peliculas

        private void BorraPeli(object envio)
        {
            Button btBorra = ((Button)envio);
            int numeroSala = Int32.Parse(btBorra.Name[btBorra.Name.Length - 1].ToString());

            if (MessageBox.Show("La pelicula seleccionada se va a eliminar", "Borrar", MessageBoxButtons.OKCancel) == DialogResult.OK)
            {
                basedatos.Elimina(misPeliculas[numeroSala]);
                misPeliculas[numeroSala] = null;
                String lbs = "lbAdmin" + numeroSala;
                String lb = "lbTaquilla" + numeroSala;
                ((Label)tabPage2.Controls[lbs]).Text = "";
                ((Label)tabPage1.Controls[lb]).Text = "";
                String pbs = "pbAdminSala" + numeroSala;
                String pb = "pbTaquillaSala" + numeroSala;
                ((PictureBox)tabPage2.Controls[pbs]).Image = pbVacia.Image;
                ((PictureBox)tabPage1.Controls[pb]).Image = pbVacia.Image;
                btAdminActualizar.Enabled = false;
                btAñadirPeliculas.Enabled = true;
                limpiaDatosPeli(numeroSala);
            }
        }

        private void ActualizaPeliculasForm()
        {
            for (int i = 0; i < 8; i++)
            {
                //if (misPeliculas[i] != null)
                    actualizaSala(i, misPeliculas[i]);
            }
        }

        private void actualizaSala(int i, Pelicula pelicula)
        {
            String lbs = "lbTaquilla" + i;
            String lb = "lbAdmin" + i;
            String pbs = "pbTaquillaSala" + i;
            String pb = "pbAdminSala" + i;
            try
            {

                ((Label)tabPage1.Controls[lbs]).Text = pelicula.Nombre;
                ((Label)tabPage2.Controls[lb]).Text = pelicula.Nombre;

                ((PictureBox)tabPage1.Controls[pbs]).Image = BaseDatos.abrirImagenNoBloqueada(pelicula.Fotos);
                ((PictureBox)tabPage2.Controls[pb]).Image = BaseDatos.abrirImagenNoBloqueada(pelicula.Fotos);
            }
            catch {
                ((Label)tabPage1.Controls[lbs]).Text = "";
                ((Label)tabPage2.Controls[lb]).Text = "";

                ((PictureBox)tabPage1.Controls[pbs]).Image = null;
                ((PictureBox)tabPage2.Controls[pb]).Image = null;
                limpiaDatosPeli(i);
            }
        }

        private void limpiaDatosPeli(int numeroSala)
        {
            foreach (object s in tabPage2.Controls["gbAñadir"].Controls)
                if (s.ToString().ToString().Contains("TextBox"))
                    ((TextBox)s).Text = "";
            cbAdminCalificacion.Text = "";
            pbAdminCartel.ImageLocation = "";
            pbxAdminImgFicha.ImageLocation = "";
            for(int i =0;i<clbAdminGenero.Items.Count;i++)
                clbAdminGenero.SetItemChecked(i, false);
            for (int i = 0; i < clbAdminFormato.Items.Count; i++)
                clbAdminFormato.SetItemChecked(i, false);
            ctpAdminFinProyeccion.Value = DateTime.Now;
            ctpAdminProyeccion.Value = DateTime.Now;
        }
        private void muestraDatosPeli(int numeroSala)
        {
            limpiaDatosPeli(numeroSala);
            if (misPeliculas[numeroSala] != null)
            {
                pelicula = misPeliculas[numeroSala];
                cbAdminCalificacion.SelectedText = pelicula.Calificacion;
                pbAdminCartel.ImageLocation = pelicula.Cartel;
                pbxAdminImgFicha.ImageLocation = pelicula.Fotos;
                clbAdminFormato.SetItemChecked(0, pelicula.TresD);
                clbAdminFormato.SetItemChecked(1, pelicula.Digital);
                clbAdminFormato.SetItemChecked(2, pelicula.TreintaYCincoMm);
                clbAdminFormato.SetItemChecked(3, pelicula.Vo);
                clbAdminFormato.SetItemChecked(4, pelicula.Vos);
                clbAdminFormato.SetItemChecked(5, pelicula.Vd);
                for (int i = 0; i < clbAdminGenero.Items.Count; i++)
                    for (int j = 0; j < pelicula.Genero.Length; j++)
                        if (clbAdminGenero.Items[i].ToString().Contains(pelicula.Genero[j]))
                            clbAdminGenero.SetItemChecked(i, true);
                ctpAdminProyeccion.Value = pelicula.Proyeccion;
                ctpAdminFinProyeccion.Value = pelicula.FinProyeccion;
                if (pelicula.FinProyeccion.CompareTo(pelicula.Proyeccion) == 0 || pelicula.FinProyeccion.CompareTo(pelicula.Proyeccion) < 0)
                {
                    ctpAdminFinProyeccion.Value = DateTime.Parse(ctpAdminProyeccion.Value.ToString()).AddDays(30);
                }
                tbAdminDescripcion.Text = pelicula.Descripcion;
                tbAdminDirector.Text = pelicula.Director;
                tbAdminDuracion.Text = pelicula.Duracion.ToString();
                tbAdminInterpretes.Text = pelicula.Interpretes;
                tbAdminNombre.Text = pelicula.Nombre;
                tbAdminSala.Text = pelicula.Sala.ToString();
                tbAdminURLTrailer.Text = pelicula.Trailer;
                btAñadirPeliculas.Enabled = false;
                btAdminActualizar.Enabled = true;
            }
            else
            {
                btAñadirPeliculas.Enabled = true;
                btAdminActualizar.Enabled = false;
            }
        }
        public void rellenaActualizaPeli()
        {
            string s = "", s2 = "";
            string[] genero = new string[clbAdminGenero.CheckedItems.Count];
            for (int i = 0; i < clbAdminGenero.CheckedItems.Count; i++)
            {
                genero[i] = clbAdminGenero.CheckedItems[i].ToString();
            }
            s = pbAdminCartel.ImageLocation;
            s2 = pbxAdminImgFicha.ImageLocation;
            pelicula.Nombre = tbAdminNombre.Text;
            pelicula.Duracion = Int32.Parse(tbAdminDuracion.Text);
            pelicula.Sala = Int32.Parse(tbAdminSala.Text);
            pelicula.Fotos = s2;
            pelicula.Cartel = s;
            pelicula.Genero = genero;
            pelicula.Trailer = tbAdminURLTrailer.Text;
            pelicula.Interpretes = tbAdminInterpretes.Text;
            pelicula.Proyeccion = ctpAdminProyeccion.Value;
            pelicula.FinProyeccion = ctpAdminFinProyeccion.Value;
            pelicula.Director = tbAdminDirector.Text;
            pelicula.Descripcion = tbAdminDescripcion.Text;
            pelicula.Calificacion = cbAdminCalificacion.Text;
            pelicula.TresD = clbAdminFormato.GetItemChecked(0);
            pelicula.Vd = clbAdminFormato.GetItemChecked(5);
            pelicula.TreintaYCincoMm = clbAdminFormato.GetItemChecked(2);
            pelicula.Vos = clbAdminFormato.GetItemChecked(4);
            pelicula.Vo = clbAdminFormato.GetItemChecked(3);
            pelicula.Digital = clbAdminFormato.GetItemChecked(1);
            pelicula.RutaCartel = tbAdminNombre.Text + ".jpg";
            pelicula.RutaFoto = tbAdminNombre.Text + ".jpg";
        }
        #endregion

        #region Eventos Peliculas

        private void pbxPeliculas_Click(object sender, EventArgs e)
        {
            if (ofdFoto.ShowDialog() != DialogResult.Cancel)
            {
                if (tbAdminNombre.Text != "")
                {
                    try
                    {

                        File.Delete(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\tmp\temporal.jpg"));
                        File.Copy(ofdFoto.FileName, Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\tmp\temporal.jpg"));
                        File.Copy(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\tmp\temporal.jpg"), Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\fotos\" + tbAdminNombre.Text + ".jpg"), true);
                        File.Delete(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\tmp\temporal.jpg"));
                        pbxAdminImgFicha.ImageLocation = Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\fotos\" + tbAdminNombre.Text + ".jpg");
                        pbxAdminImgFicha.Image = BaseDatos.abrirImagenNoBloqueada(ofdFoto.FileName);
                    }
                    catch
                    {
                        MessageBox.Show("No se ha podido colocar la imagen");
                    }
                }
                else
                    MessageBox.Show("Tienes que rellenar el nombre de la pelicula primero");
            }
        }
        private void pbAdminCartel_Click(object sender, EventArgs e)
        {
            if (ofdCartel.ShowDialog() != DialogResult.Cancel)
            {
                try{
                    File.Delete(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\tmp\temporal.jpg"));
                    File.Copy(ofdCartel.FileName, Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\tmp\temporal.jpg"));
                    File.Copy(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\tmp\temporal.jpg"), Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\carteles\" + tbAdminNombre.Text + ".jpg"), true);
                    File.Delete(Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\tmp\temporal.jpg"));
                    pbAdminCartel.ImageLocation = Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\carteles\" + tbAdminNombre.Text + ".jpg");
                    pbAdminCartel.Image = BaseDatos.abrirImagenNoBloqueada(ofdCartel.FileName);
                }
                catch
                {
                    MessageBox.Show("No se ha podido colocar la imagen");
                }
            }
            else
                MessageBox.Show("Tienes que rellenar el nombre de la pelicula primero");
        }
        private void btAñadirPeliculas_Click_1(object sender, EventArgs e)
        {
            try
            {

                if (ctpAdminProyeccion.Value > ctpAdminFinProyeccion.Value)
                {
                    MessageBox.Show("El inicio de la proyeccion no puede ser mayor que el final de la proyeccion");
                    return;
                }
                string s="", s2="";
                string[] genero = new string[clbAdminGenero.CheckedItems.Count];
                for(int i=0;i<clbAdminGenero.CheckedItems.Count;i++){
                    genero[i]=clbAdminGenero.CheckedItems[i].ToString();
                }
                    s = pbAdminCartel.ImageLocation;
                    s2 = pbxAdminImgFicha.ImageLocation;
                 pelicula = new Pelicula(tbAdminNombre.Text,
                                                Int32.Parse(tbAdminDuracion.Text),
                                                Int32.Parse(tbAdminSala.Text),
                                                 s2, clbAdminFormato.GetItemChecked(0),
                                                 clbAdminFormato.GetItemChecked(5), clbAdminFormato.GetItemChecked(2),
                                                 clbAdminFormato.GetItemChecked(4), clbAdminFormato.GetItemChecked(3), 
                                                 clbAdminFormato.GetItemChecked(1),tbAdminDescripcion.Text,ref genero,tbAdminDirector.Text,
                                                 ctpAdminProyeccion.Value,ctpAdminFinProyeccion.Value,tbAdminInterpretes.Text,
                                                 cbAdminCalificacion.Text,tbAdminURLTrailer.Text,s);
                 pelicula.RutaCartel = tbAdminNombre.Text + ".jpg";
                 pelicula.RutaFoto = tbAdminNombre.Text + ".jpg";
                 
                enviarPorFTP();

                 basedatos.Inserta(pelicula);
                 misPeliculas.ActualizaPelicula(ref pelicula, Int32.Parse(tbAdminSala.Text) - 1);
                 basedatos.cargaPeliculas(ref misPeliculas);
                 cambioSesion(Int32.Parse(tbAdminSala.Text) - 1);
                 ActualizaPeliculasForm();
                
            }
            catch
            {
                MessageBox.Show("Te falta por rellenar algunos datos de la Pelicula");
            }

        }

        private void btAdminActualizar_Click(object sender, EventArgs e)
        {
            try
            {
                rellenaActualizaPeli();

                enviarPorFTP();

                basedatos.Actualiza(pelicula);
                basedatos.cargaPeliculas(ref misPeliculas);
                cambioSesion(Int32.Parse(tbAdminSala.Text) - 1);
                ActualizaPeliculasForm();
            }
            catch
            {
                MessageBox.Show("Te falta por rellenar algunos datos de la Pelicula");
            }
        }
        

        private void pbAdminSala_Click(object sender, EventArgs e)
        {
            if (pbAnterior != null)
                pbAnterior.BorderStyle = BorderStyle.None;
            PictureBox pb = ((PictureBox)sender);
            if (anterior != null)
                anterior.Visible = false;
            ctpAdminFinProyeccion.Value = DateTime.Now.AddDays(15);
            int numeroSala = Int32.Parse(pb.Name[pb.Name.Length - 1].ToString());
            String pbs = "btAdminBorrar" + numeroSala;
            if (pb.Image != pbVacia.Image)
            ((Button)tabPage2.Controls[pbs]).Visible = true;
            else
                ((Button)tabPage2.Controls[pbs]).Visible = false;
            pb.BorderStyle = BorderStyle.FixedSingle;
            anterior = ((Button)tabPage2.Controls[pbs]);
            pbAnterior = pb;
            muestraDatosPeli(numeroSala);
        }

        private void btBorrar_Click(object sender, EventArgs e)
        {
            BorraPeli(sender);
        }
        #endregion

        #region Eventos Precios

        private void btActualizaPrecios_Click(object sender, EventArgs e)
        {
            try
            {
                float f = Math.Abs(float.Parse(tbPrecioIva.Text));
                if (f > 1)
                    f = f / 100;
                precio = new Precio(-Math.Abs(float.Parse(tbPrecioMiercoles.Text)), -Math.Abs(float.Parse(tbPrecioEspecial.Text)), Math.Abs(float.Parse(tbPrecioDigital.Text)),
                    Math.Abs(float.Parse(tbPrecio3D.Text)), Math.Abs(float.Parse(tbPrecioGafas.Text)),
                    f, Math.Abs(float.Parse(tbPrecioBase.Text)));
                basedatos.Inserta(precio);
                actualizaPrecios();
                MessageBox.Show("Los precios han sido actualizados");
            }
            catch
            {
                MessageBox.Show("No has rellenado correctamente los precios");
            }
        }
        private void tabPage3_Enter(object sender, EventArgs e)
        {
            actualizaPrecios();
        }
        #endregion

        #region Metodos Precios
        private void actualizaPrecios()
        {
            tbPrecioBase.Text = precio.PrecioBase.ToString();
            tbPrecioDigital.Text = precio.Miercoles.ToString();
            tbPrecioEspecial.Text = precio.Especial.ToString();
            tbPrecioGafas.Text = precio.Gafas.ToString();
            tbPrecioIva.Text = precio.Iva.ToString();
            tbPrecioMiercoles.Text = precio.Miercoles.ToString();
            tbPrecio3D.Text = precio.TresD.ToString();
        } 
        #endregion

        #region Eventos Empleados
        private void btModificaEmpleado_Click(object sender, EventArgs e)
        {
            basedatos.Actualiza(empleados.BuscaEmpleado(tbEmpleadosDniMod.Text));
            if (empleados.EditaEmpleado(tbEmpleadosDniMod.Text, tbEmpleadosNombreMod.Text, tbEmpleadosApellidosMod.Text, tbEmpleadosLoginMod.Text, tbEmpleadosClaveMod.Text))
            {
                MessageBox.Show("El empleado ha sido modificado");
                limpiaText();
            }
        }

        private void btBajaEmpleado_Click(object sender, EventArgs e)
        {
            basedatos.Elimina(empleados.BuscaEmpleado(tbEmpleadosDniBaja.Text));
            if (empleados.EliminaEmpleado(tbEmpleadosDniBaja.Text))
            {
                MessageBox.Show("El empleado ha sido eliminado");
                limpiaText();
            }
        }

        private void btAltaEmpleado_Click(object sender, EventArgs e)
        {
            Empleado emp = new Empleado(tbEmpleadosLogin.Text, tbEmpleadosClave.Text, tbEmpleadosNombre.Text, tbEmpleadosApellidos.Text,tbEmpleadosDni.Text);
            empleados.AñadeEmpleado(emp);
            basedatos.Inserta(emp);
            MessageBox.Show("Ha sido añadido el empleado");
            limpiaText();
        }

        private void btBuscaEmpleadoEliminar_Click(object sender, EventArgs e)
        {
            Empleado emp = empleados.BuscaEmpleado(tbEmpleadosDniBaja.Text);
            if (emp != null)
            {
                tbEmpleadosLoginBaja.Text = emp.Login;
                tbEmpleadosNombreBaja.Text = emp.Nombre;
                tbEmpleadosApellidosBaja.Text = emp.Apellidos;
            }
            else
                MessageBox.Show("El empleado no esta en la base de datos");
        }

        private void btBuscaEmpleado_Click(object sender, EventArgs e)
        {
            Empleado emp = empleados.BuscaEmpleado(tbEmpleadosDni.Text);
            if (emp != null)
            {
                tbEmpleadosLoginMod.Text = emp.Login;
                tbEmpleadosNombreMod.Text = emp.Nombre;
                tbEmpleadosApellidosMod.Text = emp.Apellidos;
            }
            else
                MessageBox.Show("El empleado no esta en la base de datos");
        }
        private void tbEmpleadosDni_Leave(object sender, EventArgs e)
        {
            if (tbEmpleadosDni.Text.Length < 9)
            {
                MessageBox.Show("El Dni tiene que tener 9 caracteres");
                tbEmpleadosDni.Focus();
            }
        }
        #endregion

        #region Metodos Empleados
        private void limpiaText()
        {
            foreach (GroupBox g in tabPage4.Controls)
                foreach (object t in g.Controls)
                {
                    if (t.ToString().ToString().Contains("TextBox"))
                        ((TextBox)t).Text = "";
                }
        } 
        #endregion

        #region FTP

        private void enviarPorFTP()
        {
            FtpSettings f = new FtpSettings("ftp://ftp.server.com", "user", "password", "images/foto", pelicula.Nombre + ".jpg", pelicula.Fotos);
            this.backgroundWorker1.RunWorkerAsync(f);
            FtpSettings f2 = new FtpSettings("ftp://ftp.server.com", "user", "password", "images/cartel", pelicula.Nombre + ".jpg", pelicula.Cartel);
            this.backgroundWorker2.RunWorkerAsync(f2);
        }
        private void backgroundWorker1_RunWorkerCompleted(object sender, RunWorkerCompletedEventArgs e)
        {
            if (e.Error != null)
                MessageBox.Show(e.Error.ToString(), "FTP error");
            else if (e.Cancelled)
                this.toolStripStatusLabel1.Text = "Upload Cancelled";
            else
                this.toolStripStatusLabel1.Text = "Upload Complete";
            tabControl1.Enabled = true;

        }
        private void backgroundWorker1_ProgressChanged(object sender, ProgressChangedEventArgs e)
        {
            tabControl1.Enabled = false;
            this.toolStripStatusLabel1.Text = e.UserState.ToString();	// the message will be something like: 45 Kb / 102.12 Mb
            this.toolStripProgressBar1.Value = Math.Min(this.toolStripProgressBar1.Maximum, e.ProgressPercentage);
        }

        private void backgroundWorker1_DoWork(object sender, DoWorkEventArgs e)
        {
            BackgroundWorker bw = sender as BackgroundWorker;
            FtpSettings f = e.Argument as FtpSettings;
            // set up the host string to request.  this includes the target folder and the target file name (based on the source filename)
            string UploadPath = String.Format("{0}/{1}{2}", f.Host, f.TargetFolder == "" ? "" : f.TargetFolder + "/", Path.GetFileName(f.SourceFile));
            if (!UploadPath.ToLower().StartsWith("ftp://"))
                UploadPath = "ftp://" + UploadPath;
            FtpWebRequest request = (FtpWebRequest)WebRequest.Create(UploadPath);
            request.UseBinary = true;
            request.UsePassive = f.Passive;
            request.Method = WebRequestMethods.Ftp.UploadFile;
            request.Credentials = new NetworkCredential(f.Username, f.Password);

            // Copy the contents of the file to the request stream.
            long FileSize = new FileInfo(f.DeDonde).Length;
            string FileSizeDescription = GetFileSize(FileSize); // e.g. "2.4 Gb" instead of 240000000000000 bytes etc...			
            int ChunkSize = 4096, NumRetries = 0, MaxRetries = 50;
            long SentBytes = 0;
            byte[] Buffer = new byte[ChunkSize];    // this buffer stores each chunk, for sending to the web service via MTOM
            using (Stream requestStream = request.GetRequestStream())
            {
                using (FileStream fs = File.Open(f.DeDonde, FileMode.Open, FileAccess.Read, FileShare.ReadWrite))
                {
                    int BytesRead = fs.Read(Buffer, 0, ChunkSize);	// read the first chunk in the buffer
                    // send the chunks to the web service one by one, until FileStream.Read() returns 0, meaning the entire file has been read.
                    while (BytesRead > 0)
                    {
                        try
                        {
                            if (bw.CancellationPending)
                                return;

                            // send this chunk to the server.  it is sent as a byte[] parameter, but the client and server have been configured to encode byte[] using MTOM. 
                            requestStream.Write(Buffer, 0, BytesRead);

                            // sentBytes is only updated AFTER a successful send of the bytes. so it would be possible to build in 'retry' code, to resume the upload from the current SentBytes position if AppendChunk fails.
                            SentBytes += BytesRead;

                            // update the user interface
                            string SummaryText = String.Format("Transferred {0} / {1}", GetFileSize(SentBytes), FileSizeDescription);
                            bw.ReportProgress((int)(((decimal)SentBytes / (decimal)FileSize) * 100), SummaryText);
                        }
                        catch (Exception ex)
                        {
                            //Debug.WriteLine("Exception: " + ex.ToString());
                            if (NumRetries++ < MaxRetries)
                            {
                                // rewind the filestream and keep trying
                                fs.Position -= BytesRead;
                            }
                            else
                            {
                                throw new Exception(String.Format("Error occurred during upload, too many retries. \n{0}", ex.ToString()));
                            }
                        }
                        BytesRead = fs.Read(Buffer, 0, ChunkSize);	// read the next chunk (if it exists) into the buffer.  the while loop will terminate if there is nothing left to read
                    }
                }
            }
            using (FtpWebResponse response = (FtpWebResponse)request.GetResponse())
                System.Diagnostics.Debug.WriteLine(String.Format("Upload File Complete, status {0}", response.StatusDescription));
        }

        public static string GetFileSize(long numBytes)
        {
            string fileSize = "";

            if (numBytes > 1073741824)
                fileSize = String.Format("{0:0.00} Gb", (double)numBytes / 1073741824);
            else if (numBytes > 1048576)
                fileSize = String.Format("{0:0.00} Mb", (double)numBytes / 1048576);
            else
                fileSize = String.Format("{0:0} Kb", (double)numBytes / 1024);

            if (fileSize == "0 Kb")
                fileSize = "1 Kb";	// min.							
            return fileSize;
        } 


        private void backgroundWorker2_ProgressChanged(object sender, ProgressChangedEventArgs e)
        {
            tabControl1.Enabled = false;
            this.toolStripStatusLabel2.Text = e.UserState.ToString();	// the message will be something like: 45 Kb / 102.12 Mb
            this.toolStripProgressBar2.Value = Math.Min(this.toolStripProgressBar2.Maximum, e.ProgressPercentage);
        }

        private void backgroundWorker2_RunWorkerCompleted(object sender, RunWorkerCompletedEventArgs e)
        {
            if (e.Error != null)
                MessageBox.Show(e.Error.ToString(), "FTP error");
            else if (e.Cancelled)
                this.toolStripStatusLabel2.Text = "Upload Cancelled";
            else
                this.toolStripStatusLabel2.Text = "Upload Complete";
            if (ctpAdminProyeccion.Value > DateTime.Now.AddDays(30) && btAñadirPeliculas.Enabled)
                MessageBox.Show("La pelicula ha sido añadida a Proximamente, no se mostrará en cartelera hasta su fecha de inicio");
            else
                if (btAñadirPeliculas.Enabled)
                    MessageBox.Show("La pelicula ha sido añadida");
                else if(btAdminActualizar.Enabled)
                    MessageBox.Show("La pelicula ha sido actualizada");
            muestraDatosPeli(pelicula.Sala - 1);
            tabControl1.Enabled = true;
        }
        #endregion
    } 
}