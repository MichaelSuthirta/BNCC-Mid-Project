function showError(){
    var popupError = document.getElementById('popupError');
    var contentError = document.getElementById('contentError');
    var closeBtn=document.getElementById('close-error');

    popupError.style.display = 'block';
    popupError.style.opacity = '1';
    popupError.style.visibility = 'visible';
    contentError.style.opacity = '1';
    contentError.style.visibility = 'visible';
    closeBtn.style.visibility = 'visible';
}

function closeError(){
    var popupError = document.getElementById('popupError');
    var contentError = document.getElementById('contentError');
    var closeBtn=document.getElementById('close-error');
    
    popupError.style.display = 'none';
    popupError.style.opacity = '0';
    popupError.style.visibility = 'hidden';
    contentError.style.opacity = '0';
    contentError.style.visibility = 'hidden';
    closeBtn.style.visibility = 'hidden';
}

function showOK(){
    var popupOK = document.getElementById('popupOK');
    var contentOK = document.getElementById('contentOK');
    var closeBtn=document.getElementById('close-ok');

    popupOK.style.display = 'block';
    popupOK.style.opacity = '1';
    popupOK.style.visibility = 'visible';
    contentOK.style.opacity = '1';
    contentOK.style.visibility = 'visible';
    closeBtn.style.visibility = 'visible';
}

function closeOK(){
    var popupOK = document.getElementById('popupOK');
    var contentOK = document.getElementById('contentOK');
    var closeBtn=document.getElementById('close-ok');
    
    popupOK.style.display = 'none';
    popupOK.style.opacity = '0';
    popupOK.style.visibility = 'hidden';
    contentOK.style.opacity = '0';
    contentOK.style.visibility = 'hidden';
    closeBtn.style.visibility = 'hidden';
    window.location.href("dashboard.php");
}

function closeDel(){
    var popupDel = document.getElementById('popupDel');
    var contentError = document.getElementById('contentDel');
    var closeBtn=document.getElementById('cancel');
    
    popupDel.style.display = 'none';
    popupDel.style.opacity = '0';
    popupDel.style.visibility = 'hidden';
    contentDel.style.opacity = '0';
    contentDel.style.visibility = 'hidden';
    cancel.style.visibility = 'hidden';
}