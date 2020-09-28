 //5
 var pseudo;

        //function prend en paramétre un pseudo et initialise la variable global avec la valeur passé en paramétre 
        /**
         * function prend un pseudo saisie par l'utilisateur et l'utilise pour intialiser la variable global pseudo et le renvoie
         * @author mazen
         * @return{string} pseudo
         */
        
        function demandePseudo(){
            let saisie = prompt(alert(" veuillez choisir un pseudo :"));
            pseudo = saisie;
            console.log(pseudo);
            return pseudo;
        }

        // 6-function compte les lettres voyelles dans un mot passer en paramétres et renvoie ce nombre 
        /**
         * function prend en paramétre une chaine de caractéres et renvoie le nombre de lettres voyelles trouvées
         * @author mazen
         * @param {string} mot 
         * @return {number} nombre de lettres voyelles 
         */
        function compteVoyelles (mot) {
            // les lettres voyelles
            let voyelles = ['a','e','i','o','u','y'];
            let motTableau = mot.split("");
            let numVoyelle = 0; 
            for(i =0;i<motTableau.length;i++){
                for(k=0;k<voyelles.length;k++){
                    if(motTableau[i]== voyelles[k]){
                        numVoyelle++;
                    }
                }


            }
            alert(" il y a "+numVoyelle+ " lettre(s) voyelle(s) dans "+ mot);
            return numVoyelle;

        }
        // function qui choisit un nombre alétoire  1 ou 0 
        /**
         * function prend en paramétre deux nombres min et max et renvoie un nombre entier entre min et max 
         * 
         * @param {number} min 
         * @param {number} max
         * @return {number} nombre alétoire entre min et max  
         */
        function entierAleatoire(min, max)
        {
                return Math.floor(Math.random() * (max - min + 1)) + min;
        }

        // 7-fonction "pileOuFace()" qui renvoie 1 en cas de pile et 0 en cas de face.

        /**
         * function renvoie  1(pile) ou 0(face)
         * @return {number} 1(pile) ou 0(face)
         */
        function pileOuFace(){
            let resultat = entierAleatoire(0,1);
            return resultat;
        }

        //fonction "lancerPileOuFace()" qui effectue les opérations suivantes:
            //Demande au joueur de choisir 1 (pile) ou 0 (face)
            //Teste que la saisie du joueur soit bien égal à 0 ou 1
            //Lance aléatoirement une pièce
            //Renvoie vrai si le joueur a correctement deviné, faux sinon
            /**
             * function demande au joueur de choisir 1 (pile) ou 0 (face)
             *  Teste que la saisie du joueur soit bien égal à 0 ou 1
             * Lance aléatoirement une pièce
             * Renvoie vrai si le joueur a correctement deviné, faux sinon
             * @return {boolean}  resultat 
             */
            function lancerPileOuFace() {
                let resultat = true ; 
                let saisiePF = prompt(alert(" veuillez choisir  1 pour pile ou 0 pour face "));
                console.log(saisiePF);
                while(saisiePF !== "0" && saisiePF!== "1"){
                    alert("saisie non valide vaous avez perdu une tentative !!");
                    resultat = false;
            
                }
                let numalea = entierAleatoire(0,1);
                console.log(numalea);
                if(saisiePF == numalea){
                        resultat = true;
                }
                else{resultat = false;}
                console.log(resultat);
                    return resultat;
            }

            //9) Créez une fonction "jeuPileOuFace()" qui respecte les règles suivantes:
               // Le joueur démarre avec 3 chances
                //Le joueur démarre avec un score à 0
                //Tant que le joueur possède des chances, il peut retenter un lancer
                //Si le joueur gagne un lancer, son score augmente, sinon ses chances baissent
                /**
                 * function respecte les règles suivantes:
                 * Le joueur démarre avec 3 chances
                 * Tant que le joueur possède des chances, il peut retenter un lancer
                 * Si le joueur gagne un lancer, son score augmente, sinon ses chances baissent
                 * 
                 * 
                 */
                function jeuPileOuFace() {
                    let numChance = 3 ;
                    let score = 0;
                    while(numChance>0){
                        let lancer = lancerPileOuFace();
                        if(lancer === true){
                            score++
                        }
                        else{ numChance--;}
                    }
                    if(numChance===0){
                        console.log(score);
                        alert("votre score est : "+score);
                    }
                    
                    return score;

                }


                // 4-function principal du programme 
                /**
                 * function principale du programme qui appelle les autre fonctions 
                 */
        function main(){
            //  déclaration de la variable global pseudo
        let meilleurScore = 0;
        let score = 0;
        let erreur = false; 
        pseudo = demandePseudo();
        
        meilleurScore = jeuPileOuFace();

    while(prompt("voulez vous jouer encore ? tapez (y) pour oui ")==="y"){
       score =  jeuPileOuFace();
    }
    if(score> meilleurScore){
        meilleurScore = score;
    }

    alert("le meilleur score de "+ pseudo+ " est :"+ meilleurScore);
           

          
        }
