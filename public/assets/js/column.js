let column = {
    patchColumn: function(inputElement,tablename,colonne)
    {   
        let title = inputElement.value;
        var data = JSON.stringify({  
            "title" : title,
            "tablename" :tablename,
            "colonne" : colonne
          });

        fetch('http://fanservices.ddns.net/bdpblsymfo/public/admin/Column', {method: 'POST', body: data})
        .then(async (response) => {
        if (response.status == 200) {
            // modifier le titre de la tache avec ce qu'on a saisie dans le champ
            let titleElement = inputElement.previousElementSibling;
            titleElement.textContent = title;
            //récupérer l'élément html de cette tache
            let taskElement = inputElement.closest('.field');
            // supprimer la classe .task--edit de notre tache
            taskElement.classList.remove('field--edit');    
        }
        else {
        alert('La modification a échoué');
        }
        })
    },
};