const minLength = 5;

document.addEventListener("DOMContentLoaded", function (event) {

    // let formAddAnimal = document.getElementById("add-new-animal");

    // formAddAnimal.addEventListener("submit", function (event) {
    // 	let form = event.target;
    // 	let nameAnimal = form.getElementsByTagName("input")[0].value;

    // 	if(nameAnimal.length < minLength)
    // 	{
    // 		event.preventDefault();
    // 		alert("Entrer un nom de + de 5 char");
    // 		return;
    // 	}
    // });

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    let forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.prototype.slice.call(forms)
        .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                let valid = true;

                // check validity of the form
                if (!form.checkValidity())
                    valid = false;


                let select = form.getElementsByClassName('custom-select')[0];
                let invalidFeedback = document.getElementsByClassName('invalid-feedback')[1];

                if (select !== undefined && parseInt(select.value) === 0) {
                    valid = false;
                    // toggle the validity
                    select.classList.remove('is-valid');
                    select.classList.add('is-invalid');

                    invalidFeedback.style.display = 'block';
                    invalidFeedback.innerHTML = 'Aucun type sélectionné.';
                }
                else if (select !== undefined) {
                    // toggle the validity
                    select.classList.remove('is-invalid');
                    select.classList.add('is-valid');

                    invalidFeedback.style.display = 'none';
                    invalidFeedback.innerHTML = '';
                }


                if (valid)
                    form.classList.add('was-validated');
                else {
                    event.preventDefault();
                    event.stopPropagation();
				}
				
            }, false);
        });

    /** Check the name input */
    let inputs = document.querySelectorAll('input');

    /**
     * Loop throught all inputs to check the length of the input text.
     */
    inputs.forEach((input) => {
        input.addEventListener('keyup', function (event) {
            console.log(this.value.length);
            let invalidFeedback = this.nextElementSibling;

            if (this.value.length < minLength) {
                this.classList.remove('is-valid');
                this.classList.add('is-invalid');

                invalidFeedback.style.display = 'block';
                invalidFeedback.innerHTML = 'Le nombre de caractères minimum est ' + minLength + ' il vous faut encore ' + (minLength - this.value.length) + ' caractères';
            }
            else {
                this.classList.remove('is-invalid');
                this.classList.add('is-valid');

                invalidFeedback.style.display = 'none';
                invalidFeedback.innerHTML = '';
            }
        }, false);
    });

    let animalSelect = document.getElementById("selectType");

    forms[1].addEventListener('submit', function (e) {
        let form = e.target;
        let modal = document.getElementById('modal-add-type');

        let newVal = parseInt(animalSelect.lastElementChild.value) + 1;
        let input = document.getElementById('input-type');
		let invalidFeedback = modal.getElementsByClassName('invalid-feedback')[0];
        let newOpt = document.createElement('option');

        // Setup a new option
        newOpt.value = newVal;
        newOpt.innerHTML = input.value;

        animalSelect.appendChild(newOpt);


        e.preventDefault();

        // Close modal
        modal.getElementsByClassName('close')[0].click();

        // Reset input field
        input.value = '';

        // Reset the validity
        input.classList.remove('is-valid');
        input.classList.remove('is-invalid');

        // Erase error message
        invalidFeedback.style.display = 'none';
        invalidFeedback.innerHTML = '';
        form.classList.remove("was-validated");

    });

});