(function(){
    const estadoDiv = document.querySelector('#estadoDiv'); 

    if(estadoDiv){
        const estadoSelect = document.querySelector('#estado');

        const divEvidencias = document.querySelector('#divEvidencias');
        const divJustificacion = document.querySelector('#divJustificacion');

        estadoSelect.addEventListener('change', manageEstadoChange);

        function manageEstadoChange(){
            const opcionSeleccionada = estadoSelect.value;
            const clase = 'add-activity__form__field--disabled';

            switch(opcionSeleccionada){
                case '1':
                    divEvidencias.classList.add(clase);
                    divJustificacion.classList.add(clase);
                    break;
                case '2':
                    divEvidencias.classList.add(clase);
                    divJustificacion.classList.add(clase);
                    break;
                case '3':
                    divEvidencias.classList.remove(clase);
                    divJustificacion.classList.add(clase);
                    break;
                case '4':
                    divEvidencias.classList.add(clase);
                    divJustificacion.classList.remove(clase);
                    break;
            }
        }
    }
})();