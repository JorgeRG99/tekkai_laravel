let colorChange = () => {
    let element = document.querySelector('nav')

    let elementVisible = 150
    let scrollY = window.scrollY

    scrollY >= elementVisible ? element.classList.add("color_change") : element.classList.remove("color_change")
}

window.addEventListener("scroll", colorChange)
colorChange()