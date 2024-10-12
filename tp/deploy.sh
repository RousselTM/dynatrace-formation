#!/bin/sh

echo -e "\nDebut de vérification: "
# Vérifie si le service Docker est actif
if [ "$(which "docker")" != "" ]; then
    echo -e "\t- Docker est installé et actif."
else
    echo -e "\t- Docker n'est pas installé ou le service n'est pas actif. Retrouvez l'explication sur la procédure d'installation à cette adresse : https://elearning.rousseltm.fr/formation/fr/conteneurisation/docker/docker-de-la-decouverte-a-lexpertise/installation-docker-engine-moteur-docker-tp-avec-vagrant-et-virtualbox-1-1xdfd52cv5d2\n"
    exit 1
fi

# Vérifie si vagrant est disponible
if [ "$(which "vagrant")" != "" ]; then
    echo -e "\t- Vagrant est installé et actif."
else
    echo -e "\t- Vagrant n'est pas installé. Retrouvez l'explication sur la procédure d'installation à cette adresse : https://elearning.rousseltm.fr/formation/fr/automatisation/vagrant/vagrant-de-la-decouverte-a-lexpertise/installation-de-vagrant-3-3sdgfs52\n"
    exit 2
fi

echo -en "\nDeploiement des VMs: "
vagrant destroy -f > tempo/deploy.log; vagrant up  > tempo/deploy.log

if [[ $? == 0 ]] ; then 
	echo "OK. \nLa liste des VMs"
    vagrant status
else 
    echo "KO. \nVérifiez le fichier de log tempo/deploy.log"
    exit 3
fi