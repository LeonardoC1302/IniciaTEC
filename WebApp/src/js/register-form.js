(function(){
    const registerStudent = document.querySelector('#register');
    const registerContainer = document.querySelector('#registerContainer');

    if(registerStudent){
        const fileInput = document.querySelector('#file');
        const fileLabel = document.querySelector('#fileLabel');

        fileInput.addEventListener('change', handleFileUpload);

        function handleFileUpload(){
            console.log("LLEGA");
            if (fileInput.files.length > 0) {
                registerContainer.classList.add('register-form__container--uploaded');

                fileLabel.textContent = fileInput.files[0].name;
              } else {
                registerContainer.classList.remove('register-form__container--uploaded');

                fileLabel.textContent = "Click para subir archivo"
              }
        }
    }

})();
