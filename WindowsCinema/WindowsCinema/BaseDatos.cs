using System;
using System.Collections.Generic;
using System.Text;
using MySql.Data.MySqlClient;
using System.Collections;
using System.Net;
using System.IO;
using System.Threading;
using System.Windows.Forms;
using System.Drawing;
using System.Drawing.Imaging;

namespace WindowsCinema
{
    class BaseDatos
    {
        #region CAMPOS
        string MyConString = "Server=SQL09.FREEMYSQL.NET;DATABASE=database;uid=user;pwd=password";
        MySqlConnection connection;
        MySqlCommand command;
        MySqlDataReader reader;
        Ticketss t;
        #endregion



        #region INSERT,UPDATE,DELETE
        public void Inserta(object inserta)
        {
            
            bool echo = false;
            try
            {

                string query = "";
                if (compruebaTipo(inserta, "Ticket"))
                {
                    Ticket t = (Ticket)inserta;
                    query = "INSERT INTO Ticket (fechaExpedicion,tipoExpedicion,tipoCobro,fechaSesion,horaSesion,idPelicula,salaProyeccion,fila,butaca,precioTotal,comprobado,loginFichar,compra)" +
                    "VALUES('" + t.fechaExpedicionToString() + "','taquilla','" + "cash" + "','" + t.fechaSesionToString() +
                            "','" + t.horaSesionToString() + "','" + t.IdPelicula + "','" + t.SalaProyeccion + "','" +
                            t.Fila + "','" + t.Columna + "','" + t.PrecioTotal + "','" + falsoVerdadero(true) + "','" + t.LoginFichar + "','"+t.Compra+"')";
                }
                else if (compruebaTipo(inserta, "Empleado"))
                {
                    Empleado e = (Empleado)inserta;
                    if (!compruebaEmpleado(e.Dni))
                        query = "INSERT INTO Empleado (login,clave,nombre,apellidos,dni) VALUES('" + e.Login + "', '" + e.Clave + "','" +
                                e.Nombre + "','" + e.Apellidos + "','" + e.Dni + "')";
                    else
                        echo = Actualiza(e);
                }
                else if (compruebaTipo(inserta, "Pelicula"))
                {
                    Pelicula p = (Pelicula)inserta;
                    if (!compruebaPeli(p.Sala, p.IdPelicula))
                    {
                        query = "INSERT INTO Pelicula (nombrePelicula,descripcion,foto,cartel,genero,director,interpretes,calificacion,trailler,duracion,tresD,vo,vos,vd,treintaycincomm,digital,fechaInicio,fechaFin,salaProyeccion)" +
                            "VALUES('" + p.Nombre + "','" +
                                p.Descripcion + "','" + p.RutaFoto + "','" + p.RutaCartel +
                                "','" + p.generoToString() + "','" + p.Director + "','" + p.Interpretes + "','" +
                                p.Calificacion + "','" + p.Trailer + "','" + p.Duracion + "','" + falsoVerdadero(p.TresD) + "','" + falsoVerdadero(p.Vo) +
                                "','" + falsoVerdadero(p.Vos) + "','" + falsoVerdadero(p.Vd) + "','" + falsoVerdadero(p.TreintaYCincoMm) + "','" + falsoVerdadero(p.Digital) + "','" + p.proyeccionToString() +
                                "','" + p.finProyeccionToString() + "','" + p.Sala + "')";
                        // subeFotos(p.Fotos, p.Nombre, "foto");
                        //subeFotos(p.Cartel, p.Nombre, "cartel");
                    }
                    else
                        echo = true;
                }
                else if (compruebaTipo(inserta, "Precio"))
                {
                    Precio p = ((Precio)inserta);
                    query = "UPDATE Precio SET fechaPrecio='" + DateTime.Now.Year + "-" + DateTime.Now.Month + "-" + DateTime.Now.Day + "', precioBase='" + p.PrecioBase + "',miercoles='" +
                        p.Miercoles + "',gafas='" + p.Gafas + "',especial='" + p.Especial +
                        "',iva='" + 100 * p.Iva + "',tresD='" + p.TresD + "',digital='" + p.Vd + "'";
                }
                if (!echo)
                {
                    //open connection
                    abreConexion();

                    //create command and assign the query and connection from the constructor
                    MySqlCommand cmd = new MySqlCommand(query, connection);

                    //Execute command
                    cmd.ExecuteNonQuery();
                }
            }
            catch (Exception e)
            {
                Console.WriteLine(e.Message);
            }

            cierraConexion();

        }

        public bool Actualiza(object a)
        {
            string query = "";
            if (compruebaTipo(a, "Empleado"))
            {
                Empleado e = (Empleado)a;
                query = "UPDATE Empleado SET login='" + e.Login + "',clave='" + e.Clave + "',nombre='" + e.Nombre + "',apellidos='" + e.Apellidos + "',dni='" + e.Dni + "'" +
                    " where dni=" + e.Dni;
            }
            else if (compruebaTipo(a, "Pelicula"))
            {
                Pelicula p = (Pelicula)a;
                query = "UPDATE Pelicula SET nombrePelicula='" + p.Nombre + "',descripcion='" + p.Descripcion + "',foto='" + p.RutaFoto +
                    "',cartel='" + p.RutaCartel + "',genero='" + p.generoToString() + "',director='" + p.Director + "',interpretes='" + p.Interpretes +
                    "',calificacion='" + p.Calificacion + "',trailler='" + p.Trailer + "',duracion='" + p.Duracion + "',tresD='" + falsoVerdadero(p.TresD) +
                    "',vo='" + falsoVerdadero(p.Vo) + "',vos='" + falsoVerdadero(p.Vos) + "',vd='" + falsoVerdadero(p.Vd) + "',treintaycincomm='" + falsoVerdadero(p.TreintaYCincoMm) +
                        "',digital='" + falsoVerdadero(p.Digital) + "',fechaInicio='" + p.proyeccionToString() + "',fechaFin='" + p.finProyeccionToString() + "',salaProyeccion='" + p.Sala + "'" +
                        " where salaProyeccion=" + p.Sala;
               // subeFotos(p.Fotos, p.Nombre, "foto");
                //subeFotos(p.Cartel, p.Nombre, "cartel");
            }

            //Open connection
            abreConexion();

            //create mysql command
            MySqlCommand cmd = new MySqlCommand(query, connection);

            //Execute query
            cmd.ExecuteNonQuery();

            //close connection
            cierraConexion();
            return true;
        }

        public void Elimina(object o)
        {
            string query = "";
            if (compruebaTipo(o, "Empleado"))
            {
                Empleado e = (Empleado)o;
                query = "DELETE FROM Empleado WHERE dni='" + e.Dni + "'";
            }
            else if (compruebaTipo(o, "Pelicula"))
            {
                Pelicula p = (Pelicula)o;
                query = "DELETE FROM Pelicula WHERE salaProyeccion='" + p.Sala + "'";
            }
            abreConexion();
            MySqlCommand cmd = new MySqlCommand(query, connection);
            cmd.ExecuteNonQuery();
            cierraConexion();

        }

        public void primerPrecio(Precio inserta)
        {
            string query = "SELECT * FROM Precio";
            //open connection
            abreConexion();

            //create command and assign the query and connection from the constructor
            MySqlCommand cmd = new MySqlCommand(query, connection);

            //Execute command
            reader = cmd.ExecuteReader();

            if (!reader.HasRows)
            {
                query = "INSERT INTO Precio (fechaPrecio,precioBase,miercoles,gafas,especial,iva,tresD,digital) VALUES('"
                    + DateTime.Now.Year + "-" + DateTime.Now.Month + "-" + DateTime.Now.Day + "', '" + inserta.PrecioBase + "','" +
                  inserta.Miercoles + "','" + inserta.Gafas + "','" + inserta.Especial +
                     "','" + 100 * inserta.Iva + "','" + inserta.TresD + "','" + inserta.Vd + "')";
                reader.Close();
                cierraConexion();
                abreConexion();
                cmd = new MySqlCommand(query, connection);
                //Execute command
                cmd.ExecuteNonQuery();
            }

            cierraConexion();
        }

        public void FicharEntrada(string login)
        {
            string query = "";
            Fichar.FicharEntrada = DateTime.Now;
            query = "INSERT INTO Fichar (loginFichar,ficharEntrada) VALUES('" + login + "','" + Fichar.FicharEntrada.Year + "-" + Fichar.FicharEntrada.Month + "-" + Fichar.FicharEntrada.Day + " " + Fichar.FicharEntrada.ToShortTimeString() + "')";
            try
            {
                abreConexion();
                MySqlCommand cmd = new MySqlCommand(query, connection);

                cmd.ExecuteNonQuery();
                cierraConexion();
            }
            catch { }
        }

        public void FicharSalida(string login)
        {
            string query = "";
            Fichar.FicharSalida = DateTime.Now;
            query = "UPDATE Fichar SET ficharSalida ='" + Fichar.FicharSalida.Year + "-" + Fichar.FicharSalida.Month + "-" + Fichar.FicharSalida.Day + " " + Fichar.FicharSalida.ToShortTimeString() + "' where loginFichar='" + login + "' and ficharEntrada='" + Fichar.FicharEntrada.Year + "-" + Fichar.FicharEntrada.Month + "-" + Fichar.FicharEntrada.Day + " " + Fichar.FicharEntrada.ToShortTimeString() + "'";

            try
            {
                abreConexion();

                MySqlCommand cmd = new MySqlCommand(query, connection);

                cmd.ExecuteNonQuery();
                cierraConexion();
            }
            catch
            {
            }
        }
        #endregion

        #region CARGAS
        public Empleados cargaEmpleados()
        {
            Empleados emps = new Empleados();
            command.CommandText = "select * from Empleado";
            try
            {
                abreConexion();
                reader = command.ExecuteReader();
                while (reader.Read())
                {
                    emps.AñadeEmpleado(new Empleado(reader.GetString(0), reader.GetString(1), reader.GetString(2), reader.GetString(3), reader.GetString(4)));
                }
                reader.Close();
                cierraConexion();
            }
            catch
            {
                
            }
            return emps;
        }
        public Ticketss cargaTickets()
        {
            t = new Ticketss();
            command.CommandText = "select  `idTicket`, `fechaExpedicion`, `tipoExpedicion`, `tipoCobro`, `fechaSesion`," +
                " `horaSesion`, t.idPelicula, t.salaProyeccion, `fila`, `butaca`, `precioTotal`, `comprobado`, t.loginFichar,p.nombrePelicula,compra"
            + "  from Ticket as t inner join Pelicula as p on t.idPelicula=p.idPelicula";
            try
            {
                    abreConexion();
                    reader = command.ExecuteReader();
                    while (reader.Read())
                    {
                        DateTime s = Convert.ToDateTime(reader.GetDateTime(5).ToShortTimeString());
                        Ticket h = new Ticket(reader.GetInt32(8), reader.GetInt32(9), reader.GetString(13), reader.GetString(2), reader.GetString(3),s , reader.GetInt32(7), reader.GetFloat(10), reader.GetString(12), reader.GetInt32(14));
                        h.IdPelicula = reader.GetInt32(6);
                        h.NumeroTicket = reader.GetInt32(0);
                        if(reader.GetDateTime(4).ToShortDateString().CompareTo(DateTime.Now.ToShortDateString())==0)
                            t.AñadeTicket(h);
                    }
                    reader.Close();
                    cierraConexion();
            }
            catch
            {
            }
            return t;
        }
        public void cargaPeliculas(ref Peliculas p)
        {
            p = new Peliculas();
            command.CommandText = "select * from Pelicula where fechaInicio<='" + DateTime.Now.Year + "-" + DateTime.Now.Month + "-" + DateTime.Now.Day + "' and fechaFin>='" + DateTime.Now.Year + "-" + DateTime.Now.Month + "-" + DateTime.Now.Day + "'";
            try
            {
                abreConexion();
                reader = command.ExecuteReader();
                while (reader.Read())
                {
                    string[] s = reader.GetString(5).Split(',');
                    Pelicula pe = new Pelicula(reader.GetString(1), reader.GetInt32(10), reader.GetInt32(19),Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\fotos\") + reader.GetString(3), numeroFV(reader.GetInt32(11)), numeroFV(reader.GetInt32(14)), numeroFV(reader.GetInt32(15)), numeroFV(reader.GetInt32(13)), numeroFV(reader.GetInt32(12)), numeroFV(reader.GetInt32(16)), reader.GetString(2), ref s, reader.GetString(6), reader.GetDateTime(17), reader.GetDateTime(18), reader.GetString(7), reader.GetString(8), reader.GetString(9), Path.Combine(Application.StartupPath + "\\" + Application.ProductName, @"\Datos\carteles\")+ reader.GetString(4));
                    pe.IdPelicula = reader.GetInt32(0);
                    p.ActualizaPelicula(ref pe, reader.GetInt32(19) - 1);
                }
                reader.Close();
                cierraConexion();
            }
            catch
            {
            }
        }
        #endregion

        #region IMAGENES
        public static Image abrirImagenNoBloqueada(string filename)
        {
            Image result;

            #region Save file to byte array

            long size = (new FileInfo(filename)).Length;
            FileStream fs = new FileStream(filename, FileMode.Open, FileAccess.Read);
            byte[] data = new byte[size];
            try
            {
                fs.Read(data, 0, (int)size);
            }
            finally
            {
                fs.Close();
                fs.Dispose();
            }

            #endregion

            #region Convert bytes to image

            MemoryStream ms = new MemoryStream();
            ms.Write(data, 0, (int)size);
            result = new Bitmap(ms);
            ms.Close();

            #endregion

            return result;
        }
        public static void guardarImagenNoBloqueada(Image img, string fn, ImageFormat format)
        {
            // Delete destination file if it already exists
            if (File.Exists(fn))
                File.Delete(fn);

            try
            {

                #region Convert image to destination format

                MemoryStream ms = new MemoryStream();
                Image img2 = (Image)img.Clone();
                img2.Save(ms, format);
                img2.Dispose();
                byte[] byteArray = ms.ToArray();
                ms.Close();
                ms.Dispose();

                #endregion

                #region Save byte array to file

                FileStream fs = new FileStream(fn, FileMode.CreateNew, FileAccess.Write);
                try
                {
                    fs.Write(byteArray, 0, byteArray.Length);
                }
                finally
                {
                    fs.Close();
                    fs.Dispose();
                }

                #endregion

            }
            catch
            {
                // Delete file if it was created
                if (File.Exists(fn))
                    File.Delete(fn);

                // Re-throw exception
                throw;
            }
        } 
        #endregion
        #region METODOS COMPROBACION
        public bool compruebaEmpleado(string dni)
        {
            command.CommandText = "select * from Empleado where dni='" + dni + "'";
            abreConexion();
            reader = command.ExecuteReader();
            reader.Close();
            cierraConexion();
            return reader.HasRows;
        }
        public bool compruebaPeli(int sala,int idPeli)
        {

            command.CommandText = "select * from Pelicula where salaProyeccion='" + sala + "' and idPelicula='"+idPeli+"'";
            abreConexion();
            reader = command.ExecuteReader();
            reader.Close();
            cierraConexion();
            return reader.HasRows;
        }
        public bool compruebaTicket(int fila, int butaca,DateTime sesion,DateTime fechaSesion,DateTime expedicion,int sala,int idPeli)
        {
            try
            {
                command.CommandText = "select * from Ticket where fila='" + fila + "' and butaca='" + butaca + "' and fechaSesion='"
                    + fechaSesion + "' and horaSesion='" + sesion + "' and fechaExpedicion='" + expedicion + "' and salaProyeccion='" + sala + "' and idPelicula='" + idPeli + "'";
                abreConexion();
                reader = command.ExecuteReader();
                reader.Close();
                cierraConexion();
                return reader.HasRows;
            }
            catch 
            {
                return true;
            }
            
        }
        public bool numeroFV(int numero)
        {
            if (numero == 1)
                return true;
            else
                return false;
        }
        public bool compruebaTipo(object o, string tipo)
        {
            return o.GetType().Equals(Type.GetType("WindowsCinema." + tipo));
        }
        public int falsoVerdadero(bool valor)
        {
            if (valor)
                return 1;
            else
                return 0;
        } 

        #endregion

        #region CONEXION
        public MySqlConnection Conexion
        {
            get
            {
                return connection;
            }
            set
            {
                connection = value;
            }
        }
        public void cierraConexion()
        {
            connection.Close();
        }
        public void abreConexion()
        {
            if (connection.State == System.Data.ConnectionState.Closed)
                connection.Open();
            else
            {
                connection.Close();
                connection.Open();
            }
        }
        #endregion

        #region CONSTRUCTOR
        public BaseDatos()
        {
            connection = new MySqlConnection(MyConString);
            command = connection.CreateCommand();
        } 
        #endregion
    }
}
