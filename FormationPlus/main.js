// all the other different functions needed
/*    function to limit words in the synopsis while adding a new movie */
 function countWords(area){
     const maxWords=100;
     var spaces= area.value.match(/\S+/g);
     var wordCount = area.value.trim().replace(/\S+/gi, ' ').split(' ').length;
     var words= spaces ? spaces.length : 0;
     if (words>maxWords  && area.keyCode !== 46
         && area.keyCode !== 8){
         var textarea= area.value.split(/\s+/, maxWords).join(" ");
         area.value=textarea+"";
     } else {
         document.getElementById("count-words").innerHTML= `${maxWords -words} word left`;
     }

 }
//  /* function to check the uploaded file's type in adding movie*/
// function isImage(icon) {
//     const ext = ['.jpg', '.jpeg', '.bmp', '.gif', '.png', '.svg'];
//     // return ext.some(el => icon.endsWith(el));
//     if(ext.some(el => icon.endsWith(el))){
//         document.getElementById("is-image").innerHTML= "The image has been uploaded.";
//         console.log("image");
//         icon.value=null;
//     }else{
//         console.log("image")
//         document.getElementById("is-image").innerHTML= "The file you've selected is not valid";
//         let form=document.getElementsByTagName("form");
//         form[1].reset();
//
//     }


    function previewFile() {
    var preview = document.querySelector('#dynamicImage');
    var file    = document.querySelector('input[type=file]').files[0];
    var reader  = new FileReader();

    reader.onloadend = function () {
    preview.src = reader.result;
}

    if (file) {
    reader.readAsDataURL(file);
} else {
    preview.src = "";
}
}





