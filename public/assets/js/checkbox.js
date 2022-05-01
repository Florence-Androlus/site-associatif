let checkbox = {
    patchCheckbox: function(checkboxElement,idCheckboxs,annee)
    {   
       // console.log('patchCheckbox');
        let dataCheckbox = '';
        let idCheckbox = idCheckboxs.value
        
        if(checkboxElement.checked == true){

            dataCheckbox = checkboxElement.value = 'X';
        }
        else{
            dataCheckbox = checkboxElement.value = '';
        }
        var data = JSON.stringify({  
            "id" : idCheckbox,
            "checkbox" : dataCheckbox,
            "annee" : annee
          });

        fetch('http://localhost/bdpblsymfo/public/Checkbox/'+idCheckbox, {method: 'POST', body: data})
        .then(async (response) => {
        if (response.status == 200) {
        //change la class pour la mettre en checked vert
        checkboxElement.classList.toggle('bg-success')
        }
        else {
        alert('La modification a échoué');
        }
        })
    },
};