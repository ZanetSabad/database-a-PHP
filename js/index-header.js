//Výběr HTML tagů se, kterými budu pracovat

const menuIcon = document.querySelector(".menu-icon")
const navigation = document.querySelector("nav")
const hambungerIcon = document.querySelector(".fa-solid")

menuIcon.addEventListener("click", () => {
    if(hambungerIcon.classList[1] === "fa-bars") {
        hambungerIcon.classList.remove("fa-bars")
        hambungerIcon.classList.add("fa-xmark")
        navigation.style.display = "block"
    } else {
        hambungerIcon.classList.remove("fa-xmark")
        hambungerIcon.classList.add("fa-bars")
        navigation.style.display = "none"
    }
})

