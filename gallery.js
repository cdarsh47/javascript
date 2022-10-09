let image_count=document.getElementsByClassName('gallery-img').length;
document.getElementsByClassName('previous-btn')[0].addEventListener('click',function(event){
    current_active=document.getElementsByClassName('active')[0].getAttribute('alt');
    if(current_active <= 1){
        current_active=image_count;
    }else{
        current_active--;
    }
    document.querySelectorAll('.gallery-img').forEach(function(value){
        if(value.classList.contains("active")){
            value.classList.remove("active");
        }
        if(parseInt(value.getAttribute('alt'))===current_active){
            value.classList.add("active");
        }
    });
    document.getElementsByClassName('image-status')[0].innerHTML='Image '+current_active+' of '+image_count;        
});
document.getElementsByClassName('next-btn')[0].addEventListener('click',function(event){
    current_active=document.getElementsByClassName('active')[0].getAttribute('alt');
    if(current_active < image_count){
        current_active++;
    }else{
        current_active=1
    }
    document.querySelectorAll('.gallery-img').forEach(function(value){
        if(value.classList.contains("active")){
            value.classList.remove("active");
        }
        if(parseInt(value.getAttribute('alt'))===current_active){
            value.classList.add("active");
        }
    });
    document.getElementsByClassName('image-status')[0].innerHTML='Image '+current_active+' of '+image_count;
});