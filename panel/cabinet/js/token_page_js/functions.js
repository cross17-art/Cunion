function  SetHighlightEvents(){
    document.querySelectorAll("[highlight-bg-color]").forEach((elem)=> {
        elem.addEventListener("mouseover", ()=>{
            let bgColor = elem.getAttribute('highlight-bg-color')
            elem.style.backgroundColor = bgColor

        })
        elem.addEventListener("mouseleave", ()=>{
            elem.style.backgroundColor = '#293042';
        })
    })
}

document.addEventListener("DOMContentLoaded", ()=> {
    SetHighlightEvents();
})