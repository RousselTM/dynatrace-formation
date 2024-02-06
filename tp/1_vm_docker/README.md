# Environnement de test
Pour faire vos TPs, nous vous recommandons de vous créer des environnements dédiées ainsi vous pouvez conserver et ne pas écraser vos configurations lorsque vous passez d'un TP à l'autre. 

# Prerequis

# Vagrant
Le moyen le plus simple pour avoir desenvironnements de tests dédiées est d'utiliser Vagrant. Nous vous invitons à suivre notre formation Vagrant pour maîtriser cet outils de Hashicorp.
Cet outil va vous permettre de créer et de supprimer des VMs sur de nombreuses solutions de virtualisation : virtualbox (solution par défaut), VMware Fusion, ... 

Pour installer vagrant, il faut suivre la procédure qui correspond à votre OS: 
```bash
https://developer.hashicorp.com/vagrant/downloads
```

# Virtualbox
Virtualbox est une solution de virtualisation très populaire racheté par Oracle.
Pour installer Virtualbox, il faut suivre la procédure qui correspond à votre OS: 
```bash
https://www.virtualbox.org/wiki/Downloads
```

# Création de l'environnement
Dans chaque dossier de TP vous trouverez un fichier Vagrantfile il vous suffira donc de lancer la commande ci-dessous lorsque vous êtes dans le dossier du TP pour créer l'environnement de test adapté au TP: 
```bash
vagrant up
```

Pourvous connecter à la machine vous pouvez la commande suivante après la création de la machine 
```bash
vagrant ssh formation-docker
```

Lorsque vous finissez votre TP, vous pouvez détruire la machine de test avec la commande ci-dessous:
```bash
vagrant destroy -f
```