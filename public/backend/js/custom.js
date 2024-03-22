$(document).ready(function() {
    let fileInput, image;
    const container = document.querySelector('.lime-body');

    if(container){
        container.addEventListener('change', function(e){
            if(e.target.classList.contains('fileInput')){
                const reader = new FileReader()
                reader.onload = function(){
                    image.src = reader.result
                }
                reader.readAsDataURL(fileInput.files[0])
                document.querySelector('.filebox').classList.add('hide');
            }
        })
    
        container.addEventListener('click', function(e){
            if(e.target.closest('.edit-target')){
                const editButton = e.target.closest('.edit-target')
                fileInput = editButton.parentElement.querySelector('input[type="file"]')
                image = editButton.parentElement.querySelector('img')
                fileInput.click();
            }
    
            if(e.target.classList.contains('tm-upload-icon') || e.target.classList.contains('upload-image-btn')){
                fileInput = document.querySelector('input[type="file"]')
                image = document.querySelector('.image-display')
                fileInput.click()
            }
        })
    }
    

    $('#wrapper').on('click', '.balletImg', function(){
        let source = $(this).attr('src');
        let mainImg = $("#mainImg");
        $('.balletImg.active').removeClass('active')
        $(this).addClass('active');

        mainImg.fadeOut(500, function(){
            $(this).attr('src', source).fadeIn(500);
        })
    })
 
    $(document).on('change', 'input[name="approval"]', function(e){
        if(e.target.checked){
            $(".approval-label span").fadeOut(200, function() {
                $(this).text("Approved")
              }).fadeIn(400);
        }else{
            $(".approval-label span").fadeOut(200, function() {
                $(this).text("Rejected")
              }).fadeIn(400);
        }
       
    })

    setTimeout(function(){
        $(".sub-success").remove();
     }, 60000 ); 

     setTimeout(function(){
        $(".notification").remove();
     }, 7000 ); 

})