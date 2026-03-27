Mbarek Cipher v1.0
==================

Mbarek Cipher est un algorithme de chiffrement expérimental en PHP utilisant des transformations multidimensionnelles
(1D, 2D, 3D) pour sécuriser les fichiers.

⚠️ Avertissement : Projet expérimental, NON AUDITÉ pour la sécurité.
Ne pas utiliser pour des données sensibles.

Fonctionnalités :
- Chiffrement et déchiffrement de fichiers
- Gestion de blocs ajustables (blockSize)
- Support pour fichiers de toutes tailles
- Exemple d'utilisation inclus

Exemple rapide :
----------------
require_once 'src/Cipher.php';
use MbarekCipher\Cipher;

$cipher = new Cipher("maCleSecrete", 4096);
$cipher->encryptFile("input.txt", "output.mbk");
$cipher->decryptFile("output.mbk", "decrypted.txt");

Auteur :
--------
Mbarek Oulkheir

Notes :
------
- Le fichier exemple (`test_cipher.php`) montre comment utiliser le cipher sur différents types de fichiers.
- Le debug est désactivé par défaut pour la publication.
- Toutes les classes (`Cipher`, `Matrix`, `LayerTransformer`) sont dans le dossier `src/classes/`.