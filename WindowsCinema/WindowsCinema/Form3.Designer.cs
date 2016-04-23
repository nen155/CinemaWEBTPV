namespace WindowsCinema
{
    partial class Form3
    {
        /// <summary>
        /// Variable del diseñador requerida.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Limpiar los recursos que se estén utilizando.
        /// </summary>
        /// <param name="disposing">true si los recursos administrados se deben eliminar; false en caso contrario, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Código generado por el Diseñador de Windows Forms

        /// <summary>
        /// Método necesario para admitir el Diseñador. No se puede modificar
        /// el contenido del método con el editor de código.
        /// </summary>
        private void InitializeComponent()
        {
            this.textBox1 = new System.Windows.Forms.TextBox();
            this.textBox2 = new System.Windows.Forms.TextBox();
            this.textBox3 = new System.Windows.Forms.TextBox();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.btAñadir = new System.Windows.Forms.Button();
            this.lbNombre = new System.Windows.Forms.Label();
            this.lbDuracion = new System.Windows.Forms.Label();
            this.lbSala = new System.Windows.Forms.Label();
            this.lbMinutos = new System.Windows.Forms.Label();
            this.lbHazClick = new System.Windows.Forms.Label();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // textBox1
            // 
            this.textBox1.Location = new System.Drawing.Point(148, 71);
            this.textBox1.Name = "textBox1";
            this.textBox1.Size = new System.Drawing.Size(171, 20);
            this.textBox1.TabIndex = 0;
            // 
            // textBox2
            // 
            this.textBox2.Location = new System.Drawing.Point(100, 123);
            this.textBox2.Name = "textBox2";
            this.textBox2.Size = new System.Drawing.Size(45, 20);
            this.textBox2.TabIndex = 1;
            // 
            // textBox3
            // 
            this.textBox3.Location = new System.Drawing.Point(100, 172);
            this.textBox3.Name = "textBox3";
            this.textBox3.Size = new System.Drawing.Size(44, 20);
            this.textBox3.TabIndex = 2;
            // 
            // pictureBox1
            // 
            this.pictureBox1.BackColor = System.Drawing.SystemColors.ButtonHighlight;
            this.pictureBox1.Location = new System.Drawing.Point(339, 74);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(109, 136);
            this.pictureBox1.TabIndex = 3;
            this.pictureBox1.TabStop = false;
            // 
            // btAñadir
            // 
            this.btAñadir.Location = new System.Drawing.Point(307, 351);
            this.btAñadir.Name = "btAñadir";
            this.btAñadir.Size = new System.Drawing.Size(158, 57);
            this.btAñadir.TabIndex = 4;
            this.btAñadir.Text = "Añadir";
            this.btAñadir.UseVisualStyleBackColor = true;
            // 
            // lbNombre
            // 
            this.lbNombre.AutoSize = true;
            this.lbNombre.Location = new System.Drawing.Point(32, 74);
            this.lbNombre.Name = "lbNombre";
            this.lbNombre.Size = new System.Drawing.Size(113, 13);
            this.lbNombre.TabIndex = 5;
            this.lbNombre.Text = "Nombre de la Pelicula:";
            // 
            // lbDuracion
            // 
            this.lbDuracion.AutoSize = true;
            this.lbDuracion.Location = new System.Drawing.Point(37, 126);
            this.lbDuracion.Name = "lbDuracion";
            this.lbDuracion.Size = new System.Drawing.Size(53, 13);
            this.lbDuracion.TabIndex = 6;
            this.lbDuracion.Text = "Duración:";
            // 
            // lbSala
            // 
            this.lbSala.AutoSize = true;
            this.lbSala.Location = new System.Drawing.Point(37, 179);
            this.lbSala.Name = "lbSala";
            this.lbSala.Size = new System.Drawing.Size(31, 13);
            this.lbSala.TabIndex = 7;
            this.lbSala.Text = "Sala:";
            // 
            // lbMinutos
            // 
            this.lbMinutos.AutoSize = true;
            this.lbMinutos.Location = new System.Drawing.Point(151, 130);
            this.lbMinutos.Name = "lbMinutos";
            this.lbMinutos.Size = new System.Drawing.Size(23, 13);
            this.lbMinutos.TabIndex = 8;
            this.lbMinutos.Text = "min";
            // 
            // lbHazClick
            // 
            this.lbHazClick.AutoSize = true;
            this.lbHazClick.Location = new System.Drawing.Point(309, 46);
            this.lbHazClick.Name = "lbHazClick";
            this.lbHazClick.Size = new System.Drawing.Size(156, 13);
            this.lbHazClick.TabIndex = 9;
            this.lbHazClick.Text = "Haz click para elegir la portada:";
            // 
            // Form3
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.AutoSize = true;
            this.ClientSize = new System.Drawing.Size(507, 420);
            this.Controls.Add(this.lbHazClick);
            this.Controls.Add(this.lbMinutos);
            this.Controls.Add(this.lbSala);
            this.Controls.Add(this.lbDuracion);
            this.Controls.Add(this.lbNombre);
            this.Controls.Add(this.btAñadir);
            this.Controls.Add(this.pictureBox1);
            this.Controls.Add(this.textBox3);
            this.Controls.Add(this.textBox2);
            this.Controls.Add(this.textBox1);
            this.Name = "Form3";
            this.Text = "Añadir una Pelicula";
            this.Load += new System.EventHandler(this.Form3_Load);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.TextBox textBox1;
        private System.Windows.Forms.TextBox textBox2;
        private System.Windows.Forms.TextBox textBox3;
        private System.Windows.Forms.PictureBox pictureBox1;
        private System.Windows.Forms.Button btAñadir;
        private System.Windows.Forms.Label lbNombre;
        private System.Windows.Forms.Label lbDuracion;
        private System.Windows.Forms.Label lbSala;
        private System.Windows.Forms.Label lbMinutos;
        private System.Windows.Forms.Label lbHazClick;
    }
}