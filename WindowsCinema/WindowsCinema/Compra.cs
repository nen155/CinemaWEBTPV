using System;
using System.Collections.Generic;
using System.Text;
using System.Collections;

namespace WindowsCinema
{
    class Compra
    {
        private List<Ticketss> compra;

        public void añadeCompra(Ticketss t)
        {
            compra.Add(t);
        }
        public List<Ticket> buscaCompra(int comp)
        {
            List<Ticket> c = new List<Ticket>();
            for (int i = 0; i < compra.Count; i++)
            {
                for (int j = 0; j < compra[i].NumeroTickets(); j++)
                    if (compra[i][j].Compra == comp)
                        c.Add(compra[i][j]);
            }
            return c;

        }
        public void eliminaCompra()
        {
            for (int i = 0; i < compra.Count; i++)
                compra.RemoveAt(i);
        }
        public bool compruebaCompra(int c)
        {
            for (int i = 0; i < compra.Count; i++)
            {
                for (int j = 0; j < compra[i].NumeroTickets(); j++)
                    if (compra[i][j].Compra == c)
                        return true;
            }
            return false;
        }
        public List<Ticketss> Compras 
        { 
            get { return compra; } 
        }
        public string[] MuestraCompra(int comp)
        {
                ArrayList ticket = new ArrayList();
                float total=0;
                ticket.Add("Compra :  " + comp);
                ticket.Add("-----------------------");
                ticket.Add("Entradas :  " + buscaCompra(comp).Count);
                ticket.Add("-----------------------");
                ticket.Add("Pelicula : " + buscaCompra(comp)[0].NombrePelicula);
                ticket.Add("-----------------------");
                ticket.Add("Sala : " + buscaCompra(comp)[0].SalaProyeccion);
                ticket.Add( "-----------------------");
                ticket.Add("Fecha Sesion : " + buscaCompra(comp)[0].FechaSesion);
                ticket.Add( "-----------------------");
                ticket.Add("Sesion : " + buscaCompra(comp)[0].HoraSesion);
                ticket.Add("-----------------------");
                ticket.Add("Fila : " + buscaCompra(comp)[0].Fila);
                ticket.Add("Butacas : ");
                foreach (Ticket t in buscaCompra(comp))
                        ticket[13] = ticket[13].ToString() + t.Columna + " ,";
                ticket.Add("-----------------------");
                foreach (Ticket t in buscaCompra(comp))
                    total += t.PrecioTotal;
                ticket.Add("Precio Total : " + Math.Round(total,1));
            

                return (string[])ticket.ToArray("".GetType());
        }
        public Compra()
        {
            compra = new List<Ticketss>();
        }
    }
}
