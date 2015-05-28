"""Extract list of URLs in a web page

This program is part of "Dive Into Python", a free Python book for
experienced programmers.  Visit http://diveintopython.org/ for the
latest version.
"""

__author__ = "Mark Pilgrim (mark@diveintopython.org)"
__version__ = "$Revision: 1.2 $"
__date__ = "$Date: 2004/05/05 21:57:19 $"
__copyright__ = "Copyright (c) 2001 Mark Pilgrim"
__license__ = "Python"



#Modified by G. Chamak OMP/Tarbes for Service Web P.Vert 

from sgmllib import SGMLParser
import csv

urlEcolab = "http://www.ecolab.omp.eu/profils"
urlLA= "http://www.aero.obs-mip.fr/profils"
urlGET="http://www.get.obs-mip.fr/profils"
urlIRAP="http://www.irap.omp.eu/profils"
source ="./annuaire_telephonique_OMP.csv"
destination="./listeWithPageProfil.csv"
antislashR="\r"
antislashN="\n"



class ExcelFr(csv.excel):
	delimiter = ";"
	lineterminator=antislashN


csv.register_dialect('excel-fr',ExcelFr())

class URLLister(SGMLParser):
	def reset(self):
		SGMLParser.reset(self)
		self.urls = []

	def start_a(self, attrs):
		href = [v for k, v in attrs if k=='href']
		if href:
			self.urls.extend(href)


def readProf(url,nomfichier,mode):
	import urllib
	fichier = open(nomfichier,mode)
	usock = urllib.urlopen(url)
	parser = URLLister()
	parser.feed(usock.read())
	parser.close()
	usock.close()
	for url in parser.urls: 
		if url.startswith('profils',1):
			name = url.split('/')
			if len(name)>2:
				if name[2]!="(offset)":
					 fichier.write(name[2]+'\n')
	fichier.close()

def addToCSV(nomfichierSrc,nomDest,nomfichierPages):
	src = open(nomfichierSrc,"r");
	dest= open(nomDest,"w")
	pages = open(nomfichierPages,"r")
	reader = csv.reader(src,'excel-fr')
	writer = csv.writer(dest,'excel-fr')
	lignes = pages.readlines()
	for row in reader:
		nom_prenom = row[1] + "_" + row[2]
		#print("nom-prenom (csv): " + nom_prenom)
		ligne = 0
		result = "false"
		for ligne in range(len(lignes)):
			#print("contenu ligne :" + lignes[ligne].rstrip("\n") + " nom-prenom (csv):" + nom_prenom)
			if lignes[ligne].rstrip("\n").lower() == nom_prenom.lower():
				result = "true"
		result = result.replace("\n","");
		row.append(result)
		writer.writerow(row)



readProf(urlEcolab,'./listePagesperso.txt',"w")
readProf(urlLA,'./listePagesperso.txt',"a")
readProf(urlIRAP,'./listePagesperso.txt',"a")
readProf(urlGET,'./listePagesperso.txt',"a")
addToCSV(source,destination,'./listePagesperso.txt')