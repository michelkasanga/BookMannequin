<script type="text/javascript">
   function __(x){
    return document.getElementById(x)
   }
   let post = __('')
    function divAuto(){
        var ajx = new XMLHttpRequest();
        ajx.onreadystatechange = function(){
            if(this.readyState === 4 && this.status ===200){
                post.innerHTML=this.response
            }
        }

        setTimeout(divAuto,1000)
    }
</script>