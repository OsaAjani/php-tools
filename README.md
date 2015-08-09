# recursive_replace
Un script PHP permettant de remplacer de façon récursive un chaine de caractère dans tous les fichiers d'un dossier.

#Exemple d'utilisation
Pour remplacer la chaine "$toto" par "$tata" dans tous les fichiers ".php" du dossier "./directory" il suffit d'utiliser la commande suivante :
```bash
./recursive_replace.php ./directory php '$toto' '$tata'
```

#Installation
Pour pouvoir utiliser ce script vous devez avoir PHP5 d'installé. Si ce n'est pas le cas, vous pouvez l'installer via la commande :
```bash
sudo apt-get install php5
```

Pour installer le script, utilisez les commandes suivantes :
```bash
wget -O recursive_replace.php https://raw.githubusercontent.com/OsaAjani/recursive_replace/master/recursive_replace.php
sudo mv recursive_replace.php /usr/bin/recursive_replace
sudo chmod +x /usr/bin/recursive_replace
```
