let boxs = document.querySelector(".msger")
let pic = document.querySelector(".pic-chat")
let more = document.querySelectorAll(".more-ser")
let close = document.querySelector(".modal-body .close")
let form = document.querySelector(".msger-inputarea")
let main = document.querySelector("main.msger-chat")
let msg = document.querySelector(".msger-input")
document.querySelectorAll(".btn-ask").forEach(e => {
    e.onclick = ()=> {
        boxs.classList.add("show-msg")
        document.querySelector("#close").click()
        pic.style.display = "none"
    }
})
document.querySelector(".pic-chat").onclick = () => {
    boxs.classList.add("show-msg")
    document.querySelector("#close").click() 
    pic.style.display = "none"
}
document.querySelector(".minus").onclick = () => {
     pic.style.display = "block"
     boxs.classList.remove("show-msg")
}

more.forEach(ele => {
    ele.onclick = () => {
        let clk = ele.dataset.toggle
        let getId = document.querySelector(`#${clk}`)
        getId.classList.add("active-model")
        getId.classList.remove("fade")

    }


})

document.querySelectorAll(".modal .close").forEach(ele => {
   ele.onclick = () => {
        let parent = ele.parentElement.parentElement.parentElement.parentElement
        parent.classList.remove("active-model")
        parent.classList.add("fade")
    }

})
 
form.addEventListener("submit", e => {
    e.preventDefault()
    let ms = msg.value.trim()
    main.innerHTML += `
        <div class="msg right-msg">
            <div class="msg-img" style="background-image: url(/assets/images/chatpot.png)"></div>

            <div class="msg-bubble">
                <div class="msg-text">
                    ${ms}
                </div>
            </div>
        </div>
        `
        msg.value = ""
    fetch("api/bot")
    .then(res => res.json())
    .then(async data => {
        let o = await data.data.messages.filter(m => m.question === ms)
        if(o.length == 0){
                                    main.innerHTML += `
                    <div class="msg left-msg">
                        <div class="msg-img" style="background-image: url(/assets/images/chatpot.png)"></div>
            
                        <div class="msg-bubble">
                            <div class="msg-text">
                              عذرا يرجي تصحيح الرسالة
                            </div>
                        </div>
                    </div>
                    `
        }else{
                                main.innerHTML += `
                    <div class="msg left-msg">
                        <div class="msg-img" style="background-image: url(/assets/images/chatpot.png)"></div>
            
                        <div class="msg-bubble">
                            <div class="msg-text">
                                ${o[0].answer}
                            </div>
                        </div>
                    </div>
                    `
        }

    })
    
})

onload = () => {
    fetch("api/bot")
    .then(res => res.json())
    .then(data => {
        main.innerHTML = `
        <div class="msg left-msg">
            <div class="msg-img" style="background-image: url(/assets/images/chatpot.png)"></div>

            <div class="msg-bubble">
                <div class="msg-text">
                    ${data.data["start-message"]}
                </div>
            </div>
        </div>
        `
    })


}
    fetch("/api/ads")
    .then(res => res.json())
    .then(images => {
        let sc = document.querySelector(".images-sc .carousel-inner")
        if(sc){
            images.data.ads.forEach(img => {
            if(img.isDeleted == 0){
                sc.innerHTML += `
                    <div class="carousel-item">
                      <img class="d-block w-100" src="images/ads/${img.image}" alt="ads">
                    </div>
                
                `
                document.querySelectorAll(".images-sc .carousel-item")[0].classList.add("active")
            }
        })
        }
        
    })




