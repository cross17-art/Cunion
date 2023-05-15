SetScaleBlockLang = (eng) => {
    if (eng === "eng") {
        document.querySelector("[scale-info][lng=eng]").style.display = "block"
        document.querySelector("[scale-info][lng=rus]").style.display = "none"
    }
    if (eng === "rus") {
        document.querySelector("[scale-info][lng=eng]").style.display = "none"
        document.querySelector("[scale-info][lng=rus]").style.display = "block"
    }

}