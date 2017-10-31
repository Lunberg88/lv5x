function sh(event,t,d,u,p,g){
    var h=document.getElementById('hint1');

    h.className="hint";

    var s='<table style="font-size:11px;" cellpadding=2 cellspacing=0><tr><td align=center><b>'+t+'</b></td></tr>';
    if(u!='') s+='<tr><td><small>Удар: '+u+'</small></td></tr>';
    if(p.length!=''){
        st=p.split(',');
        if(p.indexOf('•')>0) s+='<tr><td><small><b>Действие предмета:</b><br>';
        else s+='<tr><td><small><b>Параметры:</b><br>';
        for(i=1;i<st.length;i++) s+='&nbsp;'+st[i]+'<br>';
        s+='</small></td></tr>';
    }
    if(d!='') s+='<tr><td><small>Долговечность: '+d+'</small></td></tr>';
    if(g!='') s+='<tr><td><small>Гравировка: <font color=red>'+g+'</font></small></td></tr>';
    s+='</table>';

    h.innerHTML=s;
    setpos(event);
    h.style.visibility='visible';
}

function hh(){document.getElementById('hint1').style.visibility='hidden';}