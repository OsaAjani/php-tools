#!/usr/bin/php
<?php
        /**
         * Cette fonction analyse un dossier de façon récursive
         * @param string $dir : Le dossier à analyser
         * @param string $ext : L'extension du fichier
         * @return array : La liste des fichiers correspondants
         */
        function recursive_find($dir, $ext)
        {

                $dir = (mb_substr($dir, -1) == '/') ? mb_substr($dir, 0, mb_strlen($dir) - 1) : $dir;

                $files = []; 
                foreach (scandir($dir) as $filename)
                {
                        $filepath = $dir . '/' . $filename;

                        if ($filename == '.' || $filename == '..')
                        {
                                continue;
                        }
     
                        if (is_dir($filepath))
                        {
                                $files = array_merge($files, recursive_find($filepath, $ext));
                                continue;
                        }

                        if (preg_match('#.' . $ext . '$#iu', $filename))
                        {
                                $files[] = $filepath;
                        }
                }

                return $files;
        }

        /**
         * Cette fonction remplace une chaine dans un fichier
         * @param string $find : La chaine à chercher
         * @param string $replace : La chaine de remplacement
         * @param string $filepath : Le chemin du fichier cible
         * @return boolean
         */
        function str_replace_in_file ($find, $replace, $filepath)
        {
                $content = file_get_contents($filepath);
                if ($content === false)
                {
                        return false;
                }

                $content = mb_ereg_replace($find, $replace, $content);

                if (file_put_contents($filepath, $content) === FALSE)
                {
                        return false;
                }

                return true;
        }

        $help = $argv[0] . " <dossier_cible> <extension> <find> <replace>\n";

        if (count($argv) < 5)
        {
                fwrite(STDERR, $help);
                exit(1);
        }

        $dir = $argv[1];
        $ext = $argv[2];
        $find = $argv[3];
        $replace = $argv[4];

        if (!file_exists($dir) || !is_dir($dir))
        {
                fwrite(STDERR, "Le dossier " . $dir . " n'existe pas ou n'est pas un dossier.\n");
                exit(2);
        }

        $files = recursive_find($dir, $ext);

        foreach ($files as $file)
        {
                if (!str_replace_in_file($find, $replace, $file))
                {
                        fwrite(STDERR, "Impossible de modifier le fichier " . $file . ".\n");
                        continue;
                }

                fwrite(STDOUT, "Modification du fichier " . $file . ".\n");
        }

        exit(0);
