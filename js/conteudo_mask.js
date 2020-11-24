function mascara(o, f) {
    v_obj = o
    v_fun = f
    setTimeout("execmascara()", 1)
}
function execmascara() {
    v_obj.value = v_fun(v_obj.value)
}
function mcep(v) {
    v = v.replace(/\D/g, "")                    //Remove tudo o que nao eh digito
    v = v.replace(/^(\d{5})(\d)/, "$1-$2")         //Esse � t�o f�cil que n�o merece explica��es
    return v
}
function mtax(v) {
	v = v.replace(/\D/g, "");
	v = v.replace(/(\d)(\d{7})$/, "$1.$2");    //Coloca o . antes dos �ltimos 3 d�gitos, e antes do verificador
    v = v.replace(/(\d)(\d{4})$/, "$1.$2");
	v = v.replace(/(\d)(\d)$/, "$1 %");
	return v;
}
function mtel(v) {
    v = v.replace(/\D/g, "");             //Remove tudo o que n�o � d�gito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca par�nteses em volta dos dois primeiros d�gitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca h�fen entre o quarto e o quinto d�gitos
    return v;
}

function mtele(v) {
    v = v.replace(/\D/g, "");             //Remove tudo o que n�o � d�gito
    v = v.replace(/^(\d{2})(\d)/g, "($1) $2"); //Coloca par�nteses em volta dos dois primeiros d�gitos
    v = v.replace(/(\d)(\d{4})$/, "$1-$2");    //Coloca h�fen entre o quarto e o quinto d�gitos
    return v;
}
function cnpjEmp(v) {
    v = v.replace(/\D/g, "")                           //Remove tudo o que n�o � d�gito
    v = v.replace(/^(\d{2})(\d)/, "$1.$2")             //Coloca ponto entre o segundo e o terceiro d�gitos
    v = v.replace(/^(\d{2})\.(\d{3})(\d)/, "$1.$2.$3") //Coloca ponto entre o quinto e o sexto d�gitos
    v = v.replace(/\.(\d{3})(\d)/, ".$1/$2")           //Coloca uma barra entre o oitavo e o nono d�gitos
    v = v.replace(/(\d{4})(\d)/, "$1-$2")              //Coloca um h�fen depois do bloco de quatro d�gitos
    return v
}
function mcpf(v) {
    v = v.replace(/\D/g, "")                    //Remove tudo o que n�o � d�gito
    v = v.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto d�gitos
    v = v.replace(/(\d{3})(\d)/, "$1.$2")       //Coloca um ponto entre o terceiro e o quarto d�gitos
    //de novo (para o segundo bloco de n�meros)
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um h�fen entre o terceiro e o quarto d�gitos
    return v
}
function mdata(v) {
    v = v.replace(/\D/g, "");                    //Remove tudo o que n�o � d�gito
    v = v.replace(/(\d{2})(\d)/, "$1/$2");
    v = v.replace(/(\d{2})(\d)/, "$1/$2");

    v = v.replace(/(\d{2})(\d{2})$/, "$1$2");
    return v;
}
function mtempo(v) {
    v = v.replace(/\D/g, "");                    //Remove tudo o que n�o � d�gito
    v = v.replace(/(\d{1})(\d{2})(\d{2})/, "$1:$2.$3");
    return v;
}
function mhora(v) {
    v = v.replace(/\D/g, "");                    //Remove tudo o que n�o � d�gito
    v = v.replace(/(\d{2})(\d)/, "$1:$2");
    return v;
}

function mhoraminuto(v) {
    v = v.replace(/\D/g, "");                    //Remove tudo o que n�o � d�gito
    v = v.replace(/(\d{2})(\d)/, "$1:$2");
    v = v.replace(/(\d{2})(\d)/, "$1:$2");
    return v;
}
function mrg(v) {
    v = v.replace(/\D/g, "");                                      //Remove tudo o que n�o � d�gito
    v = v.replace(/(\d)(\d{7})$/, "$1.$2");    //Coloca o . antes dos �ltimos 3 d�gitos, e antes do verificador
    v = v.replace(/(\d)(\d{4})$/, "$1.$2");    //Coloca o . antes dos �ltimos 3 d�gitos, e antes do verificador
    v = v.replace(/(\d)(\d)$/, "$1-$2");               //Coloca o - antes do �ltimo d�gito
    return v;
}
function mnum(v) {
    v = v.replace(/\D/g, "");                                      //Remove tudo o que n�o � d�gito
    return v;
}
function mvalor(v) {
    v = v.replace(/\D/g, "");//Remove tudo o que nao e digito
    v = v.replace(/(\d)(\d{8})$/, "$1.$2");//coloca o ponto dos milhoes
    v = v.replace(/(\d)(\d{5})$/, "$1.$2");//coloca o ponto dos milhares

    v = v.replace(/(\d)(\d{2})$/, "$1,$2");//coloca a virgula antes dos 2 ultimos digitos
    return v;
}

function mvalorb(v) {
    v = v.replace(/\D/g, "");//Remove tudo o que nao e digito
    v = v.replace(/(\d)(\d{8})$/, "$1.$2");//coloca o ponto dos milhoes
    v = v.replace(/(\d)(\d{5})$/, "$1.$2");//coloca o ponto dos milhares

    v = v.replace(/(\d)(\d{2})$/, "$1.$2");//coloca a virgula antes dos 2 ultimos digitos
    return v;
}