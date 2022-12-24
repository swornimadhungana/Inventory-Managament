const side=document.querySelector(".side");
const icon=document.querySelector(".back");
const wrapper=document.querySelector(".wrapper");
icon.addEventListener("click",()=>{
    side.classList.toggle("sideActive")
    icon.classList.toggle("fa-angles-left")
    icon.classList.toggle("fa-angles-right")
    wrapper.classList.toggle("wrapperactive")
});