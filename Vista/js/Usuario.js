 
 
 
 new Vue ({
     el:'#root',
     data:{
  correo:'',
  contraseña:'',
  contraseñaconfirmar:'',
   
  
 estado:false,
  
     },
    methods:{
 enviar:function(e){
     e.preventDefault()

    
    const formdata=new FormData()
     formdata.append('usuario',this.correo)
     formdata.append('password',this.contraseña)
    // console.log(document.getElementById('usuario').value)
      fetch(' http://localhost/Colegio-Mercedes/Controlador/Controladorinsertarusuario.php',{
          method:'POST',
          body:formdata,
         

      }).then(res=>res.json())
      .then(data=>{
          console.log(data)
      })

     
 },
 Ingresar:function(){
  
 },

 Regresar:function(e){
 console.log('hola')
 e.preventDefault()
 },

 Devolver(e){
     this.estado='false'
 },
 EnviarCorreo(e){
 e.preventDefault();
 const formdata=new FormData();
 formdata.append('correo',this.correo)
 fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorCorreo.php',{
    method:'POST',
    body:formdata,
   

}).then(res=>res.json())
.then(data=>{
    console.log(data)
})

 }
    }
     
 
 

 })