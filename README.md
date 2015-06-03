![HelpDesk](http://angular.kobject.net/git/phalconist/helpdeskGitImage.png "HelpDesk")
# helpdesk
A Helpdesk Application for educational purposes using a micro-framework

# helpdesk travail réalisé

Durant le projet, nous avons passé beaucoup de temps à comprendre le fonctionnement du helpdesk donné notamment le micro-framework ainsi que le php objet. Ayant eu beaucoup de problèmes de compréhension nous avons seulement réussit à finir la création de ticket et d'article. Dans la troisième partie, nous avons réalisé la page de test, qui n'est pas complète car nous n'avons pas réussit pas implémenter toutes les fonctions demandés. Nous avons aussi essayés de faire les échanges sur tickets qui n'a pas aboutit.

# helpdesk répartition des tâches 

Ayant tous les deux des problèmes de compréhension nous avons toujours travaillé ensemble sur les mêmes tâches.s

# helpdesk Mise en oeuvre des fonctions ajoutées

Les fonctions que le projet comporte maintenant sont la création de tickets et d'articles.

Pour ajouter la création de ticket, nous avons utilisé les méthodes présentent dans le fichier models/ticket.php que nous avons exécutées dans le controller tickets.php. Dans le controller ticket.php, nous avons utilisé la méthode frm qui permettait de renvoyer vers la vue vAdd.php qui contenanit le formulaire de création du ticket.

La fonction de création d'article est basée sur le même principe que la fonction de création de ticket. Ainsi, nous avons crée un view qui contennait le formulaire de création ou nous avons mis en oeuvre ck editor

La page de test comporte les liens qui sont demandés afin de tester les fonctions implémentées. Cependant, les liens des fonctions non-implémentées renvois sur les pages tickets ou messages.

Le header a été modifié afin de mettre en service les liens "créer un ticket"; "tickets"; "foire aux questions".

# helpdesk installation du helpdesk

Pour installer le projet helpdesk, nous avons décompresser l'archive dans le dossier htdoc de xampp. Nous avons utilisé apache pour tester notre développement et mysql pour gérer la base de données. Pour se synchroniser dans le groupe nous avons utilisé Github jusqu'a ce que l'un de nous deux ne puisse plus faire de commit; nous avons donc finit le projet en utilisant google drive.