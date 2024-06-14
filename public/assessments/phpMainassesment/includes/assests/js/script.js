const wrapper = document.querySelector('.wrapper');
const registrationlink = document.querySelector('.register-link');
const loginlink = document.querySelector('.login-link');


registrationlink.onclick = ()=>{
    wrapper.classList.add('active');
}
loginlink.onclick = ()=>{
    wrapper.classList.remove('active');
}