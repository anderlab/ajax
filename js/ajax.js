
window.onload = function(){
    var msg = document.getElementById("msg");
	msg.addEventListener("keydown", function(e) {
        if (e.keyCode === 13) {  //checks whether the pressed key is "Enter"
        envia(msg.value);
        msg.value = "";
    }
});
var snd = document.getElementById("snd");
snd.addEventListener("click", function(e) {
    envia(msg.value);
    msg.value = "";
    
});
};
function onlyUnique(value, index, self) { 
    return self.indexOf(value) === index;
}

function envia(str,user) {
    var str = document.getElementById('msg').value;
    var user = document.getElementById('user').value;
    if (user=="" || user==null){
        user="ander";
    }
    if (str==="string"&& str.trim=='') { 
        alert("str="+str);
        //document.getElementById("chat").innerHTML = "";
        return;
    } else {
        if(str===undefined) str='';
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                var chat = document.getElementById("chat")
                var ipBox=document.getElementById("ips");
                
                var texto= JSON.parse(this.responseText);
                var usuarios=[];

                texto.forEach(function (element) {
                    
                    
                    usuarios.push(element[0]); 
                    
                    var linea = document.createElement("p");
                    linea.innerHTML = element[0]+" : "+element[1];
                    chat.append(linea);
                    
                } );
                
                  
                usuarios.sort();
                unique = usuarios.filter(onlyUnique); 
            
                for (let i = 0; i < unique.length; i++) { 
                    var us =document.createElement("p");
                    us.innerHTML=unique[i];
                    ipBox.append(us);
                }
                
                chat.scrollTop = chat.scrollHeight;
                setTimeout(envia,5000);
            }
            
            
        };
        xmlhttp.open("GET", "http://10.192.4.1/zubiri/ajax_backend.php?u="+user+"&q=" + str, true);
        xmlhttp.send();
    }
};