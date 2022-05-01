// on cree un module
// ce module contiendra les fonctions qui seront appelées en reaction
// aux evenements de notre application
let app = 
{
    // on cree une fonction init dans ce module
    init: function()
    {
        // pour passer la tache en mode edition
       // app.bindCheckboxsEvents();
        app.bindFieldsEvents();
    },

    bindCheckboxsEvents: function()
    {
       // console.log('bindCheckboxsEvents');
        //on recupere tous les éléments html representant les checkbox
        let existingcheckboxs = document.querySelectorAll("input[type=checkbox]")
        let idCheckboxs = document.querySelectorAll("input[type=hidden][id=idAvote]")
        let annee = document.getElementById("annee").value

        for (let i = 0; i < existingcheckboxs.length; i++)
        {
            // on appelle la fonction pour poser les ecouteur d'evenement
            // sur une tache particuliere
            // on lui passe en paramettre la tache sur laquelle 
            app.bindcheckboxEvents(existingcheckboxs[i],idCheckboxs[i],annee);
        }   
        
    },

    bindcheckboxEvents: function(Checkbox,idCheckboxs,annee)
    {
        // écouter le click sur la checkbox
        Checkbox.addEventListener('click', function(evt) {
            let checkboxElement = evt.currentTarget;
            checkbox.patchCheckbox(checkboxElement,idCheckboxs,annee);
        });
    },

    bindFieldsEvents: function()
    {
        //on recupere tous les éléments html representant les Champs
        let existingFields = document.querySelectorAll('.fields .field')
        console.log(existingFields.length);
        for (let i = 0; i < existingFields.length; i++)
        {
            // on appelle la fonction pour poser les ecouteur d'evenement
            // sur une tache particuliere
            // on lui passe en paramettre la tache sur laquelle 
            app.bindFieldEvents(existingFields[i]);
        }
    
    },

    bindFieldEvents: function(field)
    {
        // écouter le click sur le bouton edition
        let fieldButton  = field.querySelector('.field__button--modify');
        fieldButton.addEventListener('click', handler.handleEditField);

        // écouter le fait de quitter le champ input
        let fieldInput  = field.querySelector('.field__name-edit');
        console.log(fieldInput);
        fieldInput.addEventListener('blur', handler.handleFinishEditField);
            
        // écouter l'appuie sur la touche entrer quand on est en input
        fieldInput.addEventListener('keydown', handler.handleInputKeyPress);
      
    },
};
// on appelle la fonction init de notre module
// quand la page est prete
document.addEventListener('DOMContentLoaded', app.init);