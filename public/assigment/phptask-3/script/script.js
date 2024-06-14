const wrapper = document.querySelector('.wrapper');
const registrationlink = document.querySelector('.register-link');
const loginlink = document.querySelector('.login-link');
const msg = document.querySelector('#message');


registrationlink.onclick = ()=>{
    wrapper.classList.add('active');
    msg.innerHTML=" ";
}
loginlink.onclick = ()=>{
    wrapper.classList.remove('active');
}