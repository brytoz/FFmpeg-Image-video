var text_title ="Overlay text";
var imageLoader = document.getElementById('imageLoader');
    imageLoader.addEventListener('change', handleImage, false);
var canvas = document.getElementById('imageCanvas');
var ctx = canvas.getContext('2d');
var img = new Image();
const x = canvas.width / 2;
const y = canvas.height / 2;
img.crossOrigin="anonymous";

window.addEventListener('load', DrawPlaceholder)

function DrawPlaceholder() {
    img.onload = function() {
        DrawOverlay(img);
        DrawText();
        DynamicText(img)
    };
    img.src = 'https://unsplash.it/400/400/?random';
  
}

function DrawOverlay(img) {
    ctx.drawImage(img,0,0);
    ctx.fillStyle = 'rgba(30, 144, 255, 0)';
    ctx.fillRect(0, 0, canvas.width, canvas.height);
}

function DrawText() {
    ctx.fillStyle = "black";
    ctx.textBaseline = 'middle';
    ctx.font = "20px 'Ubuntu'";  
    ctx.fillText(text_title, x, 20, 200);
    
    console.log('okskdj');
    
}
function DynamicText(img) {
  document.getElementById('name').addEventListener('keyup', function() {
 /*   ctx.clearRect(0, 0, canvas.width, canvas.height);*/
    DrawOverlay(img);
    DrawText(); 
    text_title = this.value;
    ctx.textAlign = 'center';
    /*ctx.fillText(text_title, 50, 50,300);*/
  });
}
function handleImage(e) {
    var reader = new FileReader();
    var img = "";
    var src = "";
    reader.onload = function(event) {
        img = new Image();
        img.onload = function() {
            canvas.width = img.width;
            canvas.height = img.height;
            ctx.drawImage(img,0,0);
        }
        img.src = event.target.result;
        src = event.target.result;
        canvas.classList.add("show");
        DrawOverlay(img);
        DrawText(); 
        DynamicText(img);   
    }

    reader.readAsDataURL(e.target.files[0]); 
 
}
function convertToImage() {
    window.open(canvas.toDataURL('png'));
}

function rise(){
document.getElementById('download').onclick = function download() {
        convertToImage();
}


}