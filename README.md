## Ajouter les fichiers sur votre environnement local

```
cd existing_repo
git remote add origin https://github.com/Olympique13/mainbook.git
git branch -M main
git push -uf origin main
```


## Mettre à jour les packages, composants etc..
```
cd monRepo
composer install
npm install
php bin/console cache:clear
npm run build
```

***

## Utilité
Site web permettant aux utilisateurs d'emettre un avis sur divers livres et qui sert de projet pour mon épreuve E6 de mon BTS SIO option SLAM
