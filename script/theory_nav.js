jQuery(function(){

    const theory_buttons = document.querySelectorAll(".link-dark")
    const theory_nav = document.getElementById("theory-nav")
    const inicio = document.getElementById("teoria_musical")

    let article = null 
    if(showNav()){ //caso o usuário não esteja na página de teoria musical o resto do código não será executado
        setNavArticle()
    }


    $("#mainContainer").bind("DOMSubtreeModified", function() { //testa se o conteúdo do main foi alterado
        if(showNav()){
            setNavArticle()
        }
    })

    function showNav(){ //mostra a navbar de teoria musical caso esteja na página.
        page = getGetParam("p")
        
        if(page == "teoria_musical"){
            theory_nav.hidden = false
            return true
        }
        else {
            theory_nav.hidden = true
            return false
        }
    }

    function getArticle(){ //retorna o artigo presente
        article = getGetParam("art")
        return article
    }



    function setNavArticle(){ //define o artigo selecionado na navbar
        article = getArticle()

        theory_buttons.forEach(function(element){
            if (element.classList.contains("active")){
                element.classList.remove("active") 
            }
            if(article == null) {
                inicio.classList.add("active") 
            }
            else if (element.getAttribute("id") == article){
                element.parentElement.parentElement.parentElement.classList.add("show") 
                element.classList.add("active") 
            }
        })
    }

    function getGetParam(get){ //função para pegar um parametro GET
        const queryString = window.location.search;

        const urlParams = new URLSearchParams(queryString);

        let get_param = urlParams.get(get)
        return get_param
    }
  
})



