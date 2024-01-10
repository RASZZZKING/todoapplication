const tambah = document.getElementById("tambah")
const create = document.getElementById("create")
const nameList = document.getElementById("nameList")
const urgenity = document.getElementById("urgenity")
const date = document.getElementById("date")
const dateCreate = document.getElementById("dateCreate")
const time = document.getElementById("time")


const hapusList = (numba) => {
    const list = document.getElementById(`list${numba}`)
    list.style.animation = "fade-right 1s"
    setTimeout(() => {
        list.style.display = "none"
    }, 1000)

}



const tambahinaja = () => {
    tambah.style.display = "flex"
    tambah.style.animation = "fade-up .5s"
}
const hapusTambah = () => {
    tambah.style.animation = "fade-down 0.5s"
    setTimeout(() => {
        tambah.style.display = "none"
    }, 500)
}

const hapusHalTambah = () => {
    console.log("masuk");
    if (nameList.value) {
        console.log("Berhasil ke database");
        tambah.style.animation = "fade-down 1s"
            tambah.style.display = "none"
    } else{
        console.log("Failed");
    }
}
