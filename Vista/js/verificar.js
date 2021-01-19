 new Vue({
     el:"#verificar",
     data:{
 correo:'',
 contraseña:''
     },
     methods:{

        hola(e){
console.log('hola')
e.preventDefault();
        },
 enviarcorreo(e){
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
 },


 Registrar(e){
     let capturar=''
    const formdata=new FormData();
    formdata.append('correo',this.correo)
    formdata.append('contraseña',this.contraseña)
    fetch('  http://localhost/Colegio-Mercedes/Controlador/ControladorIniciarSesion.php',{
       method:'POST',
       body:formdata,
      
   
   }).then(res=>{
    
      return res.text()
      console.log(res.text())
   }).then(body=>{
   if(body){
       location.href='ActividadDocente.html'
   }
       //console.log(body)
  
   })
   
    
   e.preventDefault();
 }
     }
 }) 