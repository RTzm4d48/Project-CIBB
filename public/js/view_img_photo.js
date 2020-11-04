const file_photo_01=document.getElementById("file_photo_01");
const img_photo_01=document.getElementById("img_photo_01");

const file_photo_02=document.getElementById("file_photo_02");
const img_photo_02=document.getElementById("img_photo_02");

const file_photo_03=document.getElementById("file_photo_03");
const img_photo_03=document.getElementById("img_photo_03");


file_photo_01.addEventListener("change",function(){
    const file=this.files[0];
    if(file){
        const reader=new FileReader();
        reader.addEventListener("load",function(){
            console.log(this);
            img_photo_01.setAttribute("src",this.result);
        });
        reader.readAsDataURL(file);
        }
});
file_photo_02.addEventListener("change",function(){
    const file=this.files[0];
    if(file){
        const reader=new FileReader();
        reader.addEventListener("load",function(){
            console.log(this);
            img_photo_02.setAttribute("src",this.result);
        });
        reader.readAsDataURL(file);
        }
});
file_photo_03.addEventListener("change",function(){
    const file=this.files[0];
    if(file){
        const reader=new FileReader();
        reader.addEventListener("load",function(){
            console.log(this);
            img_photo_03.setAttribute("src",this.result);
        });
        reader.readAsDataURL(file);
        }
});