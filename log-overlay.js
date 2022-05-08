let btn = document.querySelectorAll(".connexion")

btn.forEach(btn => {
    btn.addEventListener("click", () => {
        let overlay = document.querySelector(".overlay")
        overlay.style.display = "flex"
        overlay.style.opacity = "1"
        overlay.style.zIndex = "1"
        overlay.style.pointerEvents = "all"

        let background = document.querySelector(".overlay-background")
        background.style.display = "block"

        let close = document.querySelector(".close-button")
        
        close.addEventListener("click", () => {
            overlay.style.display = "none"
            background.style.display = "none"
        }
        )
    })
})