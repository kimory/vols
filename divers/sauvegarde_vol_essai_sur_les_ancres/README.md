vols
====

Projet de gestion des vols d'une compagnie aérienne

À configurer pour visualiser le projet (cf il y a des réécritures d'URL...),
ex. sous Linux, si le projet se trouve dans /home/kimory/vols :

1) Dans /etc/hosts
127.0.0.1 doit correspondre aussi à vols

2) Dans /etc/apache2/sites-available
rajouter un fichier vols

Voici son contenu : (on peut éventuellement choisir un fichier spécifique pour les logs d'erreur de son site)

<VirtualHost *:80>
        ServerAdmin webmaster@localhost
        ServerName vols

        DocumentRoot /home/kimory/vols/public/
        <Directory />
                Options Indexes FollowSymLinks
                AllowOverride All
                Order allow,deny
                allow from all
        </Directory>

        ErrorLog ${APACHE_LOG_DIR}/error.log

        # Possible values include: debug, info, notice, warn, error, crit,
        # alert, emerg.
        LogLevel warn

        CustomLog ${APACHE_LOG_DIR}/access.log combined
</VirtualHost>


3) Activer ensuite ce fichier :
a2ensite vols

4) Charger le module rewrite pour autoriser la réécriture d'URL :
a2enmod rewrite

5) Redémarrer Apache
service apache2 restart

Note : En cas de problème, penser à vérifer les droits + regarder les logs d'erreurs dans : /var/log/apache2/
