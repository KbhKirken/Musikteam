import os
import ftplib
import ftputil

ftp_host = os.environ['FTP_HOST']
ftp_username = os.environ['FTP_USER']
ftp_password = os.environ['FTP_PASSWORD']

ftp_host = ftputil.FTPHost(ftp_host, ftp_username, ftp_password, session_factory=ftplib.FTP)
targetPath = '/htdocs'
sourcePath = './'


def createDirectories( ftp_host, dirnames ):
  listdir = ftp_host.listdir( '' );
  dirnames = [d for d in dirnames if d not in listdir]
  for dirname in dirnames:
    ftp_host.mkdir( dirname )


def uploadFiles( ftp_host, dirpath, filenames ):
  for filename in filenames:
    filepath = dirpath + '/' + filename
    print( 'uploading: ' + filepath)
    upload_result = ftp_host.upload( filepath, filename )


for dirpath, dirnames, filenames in os.walk( sourcePath ):
  path = dirpath.replace( sourcePath, targetPath ).replace( '\\', '/' )
  ftp_host.chdir( path )
  createDirectories( ftp_host, dirnames )
  uploadFiles( ftp_host, dirpath, filenames )