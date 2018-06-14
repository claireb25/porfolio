require('../css/app.scss');

var onglets = document.getElementsByClassName('onglet');
console.log(onglets.length);
for (var i=0; i<onglets.length;i++){
    onglets.addEventListener('click',function(e){
        console.log(e);
    })
}