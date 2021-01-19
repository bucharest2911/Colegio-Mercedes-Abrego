new Vue({
    el:'#app',
 data:{
     codigo:'',
     nuevacontraseña:''
 },
 methods:{
enviar:function(e){
    e.preventDefault()

    
    const formdata=new FormData()
     formdata.append('codigo',this.codigo)
     formdata.append('contraseña',this.nuevacontraseña)
    // console.log(document.getElementById('usuario').value)
      fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorActualizarCorreo.php',{
          method:'POST',
          body:formdata,
         

      }).then(res=>res.json())
      .then(data=>{
          console.log(data)
      })
}
 }
})