function go(url) {
    location.href = url;
}

function goBack() {
    history.go(-1);
}

function successGo(msg,end = ()=>{}){
    Swal.fire({
        type: '',
        title: `<span  style='color:#rgba(0,0,0,1);font-size:16px'>${msg}</span>`,
        background: 'rgba(255,255,255,1)',
        showConfirmButton: false,
        timer: 2000,
    }).then((result) => {
        end()
    });

}

function errorGo(msg){
    Swal.fire({
        type: '',
        title: `<span  style='color:#ffffff;font-size:16px'>${msg}</span>`,
        background: 'rgba(0,0,0,0.6)',
        showConfirmButton: false,
        timer: 2000,
    }).then((result) => {
        return false
    });
}




function info(msg, end) {
    message(msg, {
        time: 2000,
        end: end
    });
}

function error(msg) {
    message(msg, function() { return false; });
}

function showPopup(selector) {
    popupMask.show();
    popup = $(selector);
    popup.show();
}

function hidePopup(jThis = '') {
    if (!popup.hasClass('popup-modal')) {
        popupMask.hide();

        if(jThis){
            jThis.hide();
        }else{
            popup.hide();
        }

    }
}

var popupMask;
var popup;

$(function() {
    $('body').append('<div class="popup-mask"></div>');

    popupMask = $('.popup-mask');
    popupMask.click(()=>{
        hidePopup();
    });

    $('.header-lang,.other-lang').click(function() {
        showPopup('.lang-popup');
    });
});


function generateMixed(n){

    let chars = ['0','1','2','3','4','5','6','7','8','9','A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    let res = '';
    for(let i=0;i<n;i++){
        let id = Math.floor(Math.random()*36);
        res += chars[id]
    }
    return res

}
