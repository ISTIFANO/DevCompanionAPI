




const promesseRapide = new Promise(resolve => setTimeout(() => resolve("Rapide !"), 1000));
const promesseLente = new Promise(resolve => setTimeout(() => resolve("Lente..."), 3000));

Promise.race([promesseRapide, promesseLente])
    .then(result => console.log("Résultat :", result))
    .catch(error => console.error("Erreur :", error));
