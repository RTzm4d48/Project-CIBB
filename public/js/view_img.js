const inpFile=document.getElementById("inpFile");
const previewImage=document.getElementById("imagePreview");
inpFile.addEventListener("change",function(){
    const file=this.files[0];
    if(file){
        const reader=new FileReader();
        reader.addEventListener("load",function(){
            console.log(this);
            previewImage.setAttribute("src",this.result);
        });
        reader.readAsDataURL(file);
        }
});
