(function(){
    const divRadio = document.querySelector('#radioTeams');
    const divProfessors = document.querySelector('#teamProfessors');

    if(divRadio){
        const radioButtons = document.querySelectorAll('input[type="radio"]');
        radioButtons.forEach(radio => {
            radio.addEventListener('change', handleRadioChange);
        });

        async function renderProfessors(teamId){
            const url = `/api/professors?id=${teamId}`;
            const response = await fetch(url);
            const data = await response.json();

            // Professor select title
            if(divProfessors.children.length > 0){
                divProfessors.innerHTML = '';
            }
            const profListTitle = document.createElement('h3');
            profListTitle.textContent = 'Selecciona un profesor';
            profListTitle.classList.add('coordinator__form__title');
            divProfessors.appendChild(profListTitle);

            // Delete if data is empty
            if(data.length === 0){
                const noProfessors = document.createElement('p');
                noProfessors.textContent = 'No hay profesores disponibles para este equipo.';
                noProfessors.classList.add('coordinator__form__no-professors');
                divProfessors.appendChild(noProfessors);
                return;
            }

            // Radio for each professor
            /*
            <label class="coordinator__form__label--radio">
                    <input type="radio" class="coordinator__form__radio" name="teamId" value="<?php echo $team->id; ?>">
                    <span class="coordinator__form__radio__text"><?php echo $team->nombre; ?></span>    
                </label>
            */

            const divRadioButtons = document.createElement('div');
            divRadioButtons.classList.add('coordinator__form__field');

            data.forEach(professor => {
                const label = document.createElement('label');
                label.classList.add('coordinator__form__label--radio');

                const input = document.createElement('input');
                input.type = 'radio';
                input.classList.add('coordinator__form__radio');
                input.name = 'profId';
                input.value = professor.profesorId;
                // add the checkRadio function to check the radio button
                input.addEventListener('change', checkRadio);
                
                const span = document.createElement('span');
                span.classList.add('coordinator__form__radio__text');
                span.textContent = professor.nombre + ' ' + professor.apellidos;

                label.appendChild(input);
                label.appendChild(span);

                divRadioButtons.appendChild(label);
            });
            divProfessors.appendChild(divRadioButtons);


            // Add submit button if data is not empty}
            const submitButton = document.createElement('button');
            radioButtons.type = 'submit';
            submitButton.textContent = 'Asignar';
            submitButton.classList.add('coordinator__form__submit');
            divProfessors.appendChild(submitButton);
        }

        function handleRadioChange(e){
            renderProfessors(e.target.value);
            // if checked add class to label
            radioButtons.forEach(radio => {
                if(radio.checked){
                    radio.parentElement.classList.add('coordinator__form__label--radio--checked');
                }else{
                    radio.parentElement.classList.remove('coordinator__form__label--radio--checked');
                }
            });
        }

        function checkRadio(e){
            // Get the professors radio buttons
            const radioButtons = document.querySelectorAll('input[name="profId"]');
            // Uncheck all radio buttons
            radioButtons.forEach(radio => {
                if(radio.checked){
                    radio.parentElement.classList.add('coordinator__form__label--radio--checked');
                }else{
                    radio.parentElement.classList.remove('coordinator__form__label--radio--checked');
                }
            })
        }
    }
})();