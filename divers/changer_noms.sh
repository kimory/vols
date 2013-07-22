#!/bin/bash

# mv public/include/back_office_login_form.php public/include/formulaire_auth_admin.php
# mv public/include/back_office_menu.php public/include/menu_bo.php
# mv public/include/create_user_form.php public/include/formulaire_creation_client.php
# mv public/include/user_connection_form.php public/include/formulaire_connexion_client.php

sed -i "s/back_office_login_form/formulaire_auth_admin/g"  public/*.php public/include/*.php public/.htaccess
sed -i "s/back_office_menu/menu_bo/g"  public/*.php public/include/*.php public/.htaccess
sed -i "s/create_user_form/formulaire_creation_client/g" public/*.php  public/include/*.php public/.htaccess
sed -i "s/user_connection_form/formulaire_connexion_client/g"  public/*.php public/include/*.php public/.htaccess
