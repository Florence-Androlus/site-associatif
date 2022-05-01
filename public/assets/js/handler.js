// ce module contiendra les fonctions qui seront appelées en reaction
// aux evenements de notre application
let handler= 
{
    handleEditField: function(evt)
    {
        //console.log('handle ');

        //identifier la tacher à passer en mode edition
        //console.log(evt.currentTarget);
        let triggerElement = evt.currentTarget;
        //récupérer l'élément html de cette tache
        let fieldElement = triggerElement.closest('.field');
        //changer la classe de l'élément html de cette tache
        fieldElement.classList.add('field--edit');
        // on mets le focus dans l'input qu'on vient d'afficher
        let inputElement = fieldElement.querySelector(".field__name-edit");
         inputElement.focus();

    },

    handleFinishEditField: function(evt)
    {   
        let tablename = document.getElementById("tablename").value

        let inputElement = evt.currentTarget;
        // recuperer ce qui a ete saisie dans le champ
        let colonne = inputElement.previousElementSibling.value;
        let title = inputElement.value;

        column.patchColumn(inputElement,tablename,colonne);
    },

    handleInputKeyPress: function(evt)
    {
        if (evt.key=="Enter")
        {
            handler.handleFinishEditField(evt);
        }
    },

}