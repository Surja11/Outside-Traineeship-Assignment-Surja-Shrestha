const questions= document.getElementsByClassName('faq__qa');

questionList = Array.from(questions)

questionList.forEach(question => {

    question.addEventListener('click',()=>{
        
        questionList.forEach(openQuestion=>{
            if(openQuestion!=question){
                openQuestion.getElementsByClassName('faq__answer')[0].classList.add('is-hidden');
                openQuestion.classList.remove('faq__qa--open');
            }
        })
        answer = question.getElementsByClassName('faq__answer')[0];
        container = question.getElementsByClassName('faq__question-container')[0];      
        answer.classList.toggle('is-hidden');
        question.classList.toggle('faq__qa--open');
    
    })    
})