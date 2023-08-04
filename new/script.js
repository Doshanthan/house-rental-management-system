function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
    
    const menuBtn =document.querySelector('.menuBtn')
   const navlinks=document.querySelector('.navlinks')

    menuBtn.addEventListener('click',()=>{
        navlinks.classList.toggle('mobilemenu')
    })

    const wrapper=document.querySelector('.wrapper');
    const loginregister=document.querySelector('.loginregister');
    const register=document.querySelector('.register');
    const btnPop=document.querySelector('.sctn');
    const btnpop=document.querySelector('.ctn');
    const CloseIcon=document.querySelector('.CloseIcon');

    loginregister.addEventListener('click',()=>{
        wrapper.classList.add('active');
    });
    register.addEventListener('click',()=>{
        wrapper.classList.remove('active');
    });
    btnPop.addEventListener('click',()=>{
        wrapper.classList.add('active-popup');
    });
    btnpop.addEventListener('click',()=>{
        wrapper.classList.add('active-popup');
    });
    CloseIcon.addEventListener('click',()=>{
        wrapper.classList.remove('active-popup');
    });