(function(){
    const radio1 = document.querySelector("#Uno");
    
    if(radio1){
        const opcionesDiv = document.querySelector("#report");

        const radiobuttons = document.querySelectorAll('.report__form__radio')
        radiobuttons.forEach((radio)=>{
            radio.addEventListener('change', handleRadio)
        })
        function handleRadio(){
            if(radio1.checked){
                opcionesDiv.classList.remove('report__form__container--disabled');
            }else{
                opcionesDiv.classList.add('report__form__container--disabled');
            }
        }
    }
})();