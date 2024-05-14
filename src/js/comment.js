(function(){
    const commentActivity = document.querySelector('.activity__main__comment');

    if (commentActivity) {
        const commentForm = document.querySelector('#commentForm');

        if(commentForm) {
            const x = document.querySelector('#formClose');
            x.addEventListener('click', toggleForm);
        }
        
        commentActivity.addEventListener('click', toggleForm);

        function toggleForm() {
            commentForm.classList.toggle('comment-form-container--disabled');
            const input = document.querySelector('#inputCommentId');
            input.value = '';
        }
    }

    const comments = document.querySelector('#comments');

    if (comments) {
        const subcomments = document.querySelectorAll('.comment__comment');
        
        subcomments.forEach(subcomment => {
            subcomment.addEventListener('click', toggleSubcommentInputValue);
        }
        );

        function toggleSubcommentInputValue() {
            toggleForm();
            const input = document.querySelector('#inputCommentId');
            // toggle the value of the input field (null or the comment id)
            if(input.value == ''){
                input.value = this.dataset.commentid;
            } else {
                input.value = '';
            }
        }
    }

})();