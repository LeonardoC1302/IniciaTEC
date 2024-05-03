(function(){
    const radio1 = document.querySelector("#Uno");
    const radio2 = document.querySelector("#Todos");
    const radioOne = document.querySelector("#radioOne");
    const radioAll = document.querySelector("#radioAll");
    radioOne.classList.add('report__form__options__option--active');
    if(radio1){
        const opcionesDiv = document.querySelector("#report");

        const radiobuttons = document.querySelectorAll('.report__form__radio')
        radiobuttons.forEach((radio)=>{
            radio.addEventListener('change', handleRadio)
        })
        
        function handleRadio(){
            if(radio1.checked){
                //console.log(radioOne);
                opcionesDiv.classList.remove('report__form__container--disabled');
                radioOne.classList.add('report__form__options__option--active');
                radioAll.classList.remove('report__form__options__option--active');
            }else{
                //console.log(radioAll);
                opcionesDiv.classList.add('report__form__container--disabled');
                radioOne.classList.remove('report__form__options__option--active');
                radioAll.classList.add('report__form__options__option--active');
            }
        }
    }
})();