using System;
using System.Collections.Generic;
using System.Text;

namespace WindowsCinema
{
    public class FtpSettings
    {
        #region CAMPOS
        private bool passive;
        private int port;
        private string host;
        private string username;
        private string password;
        private string targetFolder;
        private string sourceFile; 
        #endregion

        #region PROPIEDADES
        public int Port
        {
            get { return port; }
            set { port = value; }
        }

        public bool Passive
        {
            get { return passive; }
            set { passive = value; }
        }



        public string Host
        {
            get { return host; }
            set { host = value; }
        }


        public string Username
        {
            get { return username; }
            set { username = value; }
        }


        public string Password
        {
            get { return password; }
            set { password = value; }
        }


        public string TargetFolder
        {
            get { return targetFolder; }
            set { targetFolder = value; }
        }


        public string SourceFile
        {
            get { return sourceFile; }
            set { sourceFile = value; }
        }
        private string deDonde;

        public string DeDonde
        {
            get { return deDonde; }
            set { deDonde = value; }
        }
        
        #endregion
        

        public FtpSettings(string hos, string user, string pass, string folder, string file,string dedonde)
        {
            passive = true;
            port = 21;
            host = hos;
            username = user;
            password = pass;
            targetFolder = folder;
            DeDonde = dedonde;
            sourceFile = file;
        }
    }
}
