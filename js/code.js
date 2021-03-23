// to top button 
const toTopbtn = document.querySelector('.toTopbtn');

toTopbtn.addEventListener('click',()=>{
    console.log('clicked');
    window.scroll({top:0,left:0, behavior:'smooth'});
});

// toggle ps button
const passField = document.querySelector('#regPass')
const toggleBtn = document.querySelector('#togglePs')

toggleBtn.addEventListener('click', function(){
    if( passField.type ==="password"){
        passField.type ="text"
        toggleBtn.classList.remove('fa-eye-slash')
        toggleBtn.classList.add('fa-eye')
    }else{
        passField.type ="password"
        toggleBtn.classList.remove('fa-eye')
        toggleBtn.classList.add('fa-eye-slash')
    }
    
})
