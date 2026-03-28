![PHP](https://img.shields.io/badge/PHP-8.2-blue)
![License](https://img.shields.io/badge/License-MIT-green)
![Release](https://img.shields.io/badge/Release-v1.0-yellow)

# 🔐 Mbarek Cipher v1.0

Mbarek Cipher est un algorithme de chiffrement expérimental en PHP utilisant des transformations multidimensionnelles (1D, 2D, 3D) pour sécuriser les fichiers.

---

## ⚠️ Avertissement

> Projet expérimental — NON AUDITÉ pour la sécurité.  
> ❌ Ne pas utiliser pour des données sensibles.

---

## ✨ Fonctionnalités

- 🔒 Chiffrement et déchiffrement de fichiers  
- 📦 Gestion de blocs ajustables (`blockSize`)  
- 📁 Support des fichiers de toutes tailles  
- 🧪 Exemples d’utilisation inclus

---

## ⚡ Installation

Clone le repo et accédez au dossier du projet :

```bash
git clone https://github.com/OulkheirMbarek/MbarekCipher.git
cd MbarekCipher
```
## 🚀 Exemple rapide
```php
require_once 'src/Cipher.php';

use MbarekCipher\Cipher;

$cipher = new Cipher("maCleSecrete", 4096);

$cipher->encryptFile("input.txt", "output.mbk");
$cipher->decryptFile("output.mbk", "decrypted.txt");
```
## 📂 Structure du projet

Voici l’organisation des fichiers principaux :
```text
MbarekCipher/
├── src/
│   ├── Cipher.php
│   └── classes/
│       ├── Matrix.php
│       └── LayerTransformer.php
├── examples/
├── tests/
├── README.md
└── LICENSE
```

👤 Auteur

Mbarek Oulkheir
📧 oulkheir@gmail.com
📍 Maroc, Haut Atlas

📜 Licence

Ce projet est sous licence MIT. Voir le fichier LICENSE
 pour tous les détails.

🙏 Remerciements / Inspirations

Ce projet a été grandement soutenu et guidé par l'assistant IA ChatGPT, qui a aidé à :

structurer l’algorithme
améliorer le code PHP
comprendre GitHub

Merci à toutes les intelligences artificielles et outils qui rendent le développement plus accessible et créatif.

📝 Notes
Le fichier exemple (test_cipher.php) montre comment utiliser le cipher sur différents types de fichiers
Le debug est désactivé par défaut pour la publication
Toutes les classes (Cipher, Matrix, LayerTransformer) sont dans le dossier src/classes/

## 🚧 Roadmap

- [ ] Optimisation des performances
- [ ] Tests sur fichiers volumineux
- [ ] Analyse d’entropie
- [ ] Amélioration du chiffrement multidimensionnel
- [ ] Version 2.0 (matrice 3D avancée)

## 🎯 Résultat attendu

Après utilisation du Mbarek Cipher :

✅ Chiffrement et déchiffrement réussis des fichiers
✅ Support de fichiers de toutes tailles
✅ Exemple d’utilisation fonctionnel
✅ Code source structuré et facile à comprendre
✅ Projet prêt pour feedback et tests publics
