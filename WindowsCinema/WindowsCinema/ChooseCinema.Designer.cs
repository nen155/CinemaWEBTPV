namespace WindowsCinema
{
    partial class ChooseCinema
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
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(ChooseCinema));
            this.lbElige = new System.Windows.Forms.Label();
            this.lb2000 = new System.Windows.Forms.LinkLabel();
            this.btSalir = new System.Windows.Forms.Button();
            this.SuspendLayout();
            // 
            // lbElige
            // 
            this.lbElige.AutoSize = true;
            this.lbElige.Location = new System.Drawing.Point(65, 62);
            this.lbElige.Name = "lbElige";
            this.lbElige.Size = new System.Drawing.Size(109, 13);
            this.lbElige.TabIndex = 0;
            this.lbElige.Text = "Elija uno de los cines:";
            // 
            // lb2000
            // 
            this.lb2000.AutoSize = true;
            this.lb2000.Font = new System.Drawing.Font("Microsoft Sans Serif", 14.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.lb2000.Location = new System.Drawing.Point(129, 145);
            this.lb2000.Name = "lb2000";
            this.lb2000.Size = new System.Drawing.Size(161, 24);
            this.lb2000.TabIndex = 1;
            this.lb2000.TabStop = true;
            this.lb2000.Text = "Theatrum Cinema";
            this.lb2000.LinkClicked += new System.Windows.Forms.LinkLabelLinkClickedEventHandler(this.lb2000_LinkClicked);
            // 
            // btSalir
            // 
            this.btSalir.Location = new System.Drawing.Point(262, 268);
            this.btSalir.Name = "btSalir";
            this.btSalir.Size = new System.Drawing.Size(120, 23);
            this.btSalir.TabIndex = 5;
            this.btSalir.Text = "Salir";
            this.btSalir.UseVisualStyleBackColor = true;
            this.btSalir.Click += new System.EventHandler(this.btSalir_Click);
            // 
            // Form1
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(6F, 13F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.BackgroundImage = global::WindowsCinema.Properties.Resources.cine;
            this.ClientSize = new System.Drawing.Size(455, 332);
            this.Controls.Add(this.btSalir);
            this.Controls.Add(this.lb2000);
            this.Controls.Add(this.lbElige);
            this.Icon = ((System.Drawing.Icon)(resources.GetObject("$this.Icon")));
            this.Name = "Form1";
            this.StartPosition = System.Windows.Forms.FormStartPosition.CenterScreen;
            this.Text = "Theatrum Cinema";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Label lbElige;
        private System.Windows.Forms.LinkLabel lb2000;
        private System.Windows.Forms.Button btSalir;
    }
}

