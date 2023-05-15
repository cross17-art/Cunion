

class ActiveImageHandler {
    activeImages = [];

    baseX = 100;
    baseY = 200;

    Radius = 120;

    Init = () => {

        if(window.screen.width < 500){
            this.baseX = 320;
            this.baseY = 250;
        }

        document.querySelectorAll(".active-image").forEach((activeImageElement) => {
            let newActiveImage = new ActiveImage(activeImageElement);
            this.activeImages.push(newActiveImage)
        })

        if(window.screen.width < 500){
            this.PlaceAllDefault(130, 120);
        } else {
            this.PlaceAllDefault()
        }
    }


    PlaceAllDefault = (deltaAlpha = 180, radius = 120) =>{

        let a1 = 2*Math.PI/3 + Math.PI/180*deltaAlpha;
        let a2 = 2*Math.PI *2/3 + Math.PI/180*deltaAlpha;
        let a3 = 2*Math.PI*3/3 + Math.PI/180*deltaAlpha;

        this.activeImages[0].SetPoint({x:Math.cos(a1)*radius, y:Math.sin(a1)*radius});
        this.activeImages[1].SetPoint({x:Math.cos(a2)*radius, y:Math.sin(a2)*radius});
        this.activeImages[2].SetPoint({x:Math.cos(a3)*radius, y:Math.sin(a3)*radius});
        document.querySelector('.cabinet_block').style.display = 'block';
    }

    StartAnimation(){

    }


    SetMainBlockPosition = (point) => {
        document.querySelector('[cabinet_images]').style.left = point.x + 'px';
        document.querySelector('[cabinet_images]').style.top = point.y + 'px';
    }
}



class ActiveImage {

    baseY;
    baseX;

    constructor(elem, point = null) {
        this.elem = elem;


        if(point != null){
            this.SetPoint(point);
        }
    }


    SetPoint = (point) => {
        this.SetX(active_image_handler.baseX + point.x);
        this.SetY(active_image_handler.baseY + point.y);
        this.baseY = point.y;
        this.baseX = point.x;
    };

    SetX = (x) => {
        let elemWidth = this.elem.getBoundingClientRect().width;
        this.elem.style.left = (x - elemWidth/2) + "px";
    };

    SetY = (y) => {
        let elemHeight = this.elem.getBoundingClientRect().height;
        this.elem.style.top = (y - elemHeight/2) + "px";
    };

    SetWidth = (width) => {
        this.elem.style.width = width + "px";
    };

    elem;
}


active_image_handler = new ActiveImageHandler();
active_image_handler.Init();

console.log("END");

document.body.addEventListener('mousemove', e=>{
    // let distanceToCenter = Math.abs(document.querySelector(".cabinet_block").getBoundingClientRect().left - e.offsetX)
    // console.log(distanceToCenter);
    // let delta = distanceToCenter/10;
    // console.log(delta);
    // active_image_handler.PlaceAllDefault(180)

});


sw1 = true
sw2 = true
sw3 = true
setInterval(()=>{
    if(sw1 == true){
        active_image_handler.activeImages[0].elem.style.transform = 'scale(1.2)';
        sw1 = false;
    } else {
        active_image_handler.activeImages[0].elem.style.transform = 'scale(1.0)';
        sw1 = true;
    }

},2000)

setInterval(()=>{
    if(sw2 == true){
        active_image_handler.activeImages[1].elem.style.transform = 'scale(1.2)';
        sw2 = false;
    } else {
        active_image_handler.activeImages[1].elem.style.transform = 'scale(1.0)';
        sw2 = true;
    }

},2500)

setInterval(()=>{
    if(sw3 == true){
        active_image_handler.activeImages[2].elem.style.transform = 'scale(1.2)';
        sw3 = false;
    } else {
        active_image_handler.activeImages[2].elem.style.transform = 'scale(1.0)';
        sw3 = true;
    }

},1500)


document.addEventListener("DomContentLoaded", () => {
    active_image_handler.activeImages[0].elem.style.transform = 'scale(1.2)';
    active_image_handler.activeImages[1].elem.style.transform = 'scale(1.2)';
    active_image_handler.activeImages[2].elem.style.transform = 'scale(1.2)';
})