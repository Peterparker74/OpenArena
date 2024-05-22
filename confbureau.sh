#!/bin/bash

# Récupérer le nom de l'utilisateur actuel
current_user=$(whoami)

# Charger le fichier de configuration en fonction de l'utilisateur
if [ "$current_user" = "utilisateur1" ]; then
    # Charger le fichier de configuration pour utilisateur1
    pcmanfm --desktop --profile LXDE --config=/chemin/vers/fichier_configuration_utilisateur1.conf &
elif [ "$current_user" = "utilisateur2" ]; then
    # Charger le fichier de configuration pour utilisateur2
    pcmanfm --desktop --profile LXDE --config=/chemin/vers/fichier_configuration_utilisateur2.conf &
else
    # Afficher un message d'erreur si l'utilisateur n'est pas reconnu
    echo "Utilisateur inconnu : $current_user"
fi
