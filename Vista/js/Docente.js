
 



const x=new  Vue({

    el:'#root',
    data:{
        
        nombre:'',
        apellido:'',
        tipo_identificacion:'',
      
        contraseña:'',
        tipo_persona:'3',
        email:'',
        
   mensaje:'hola'
    },


    methods:{

        EnviarDatosDocente(e){
           
            e.preventDefault();

            let dato=document.getElementById('n_id').value;
            
            const formdata=new FormData();
            formdata.append('nombre',this.nombre)
            formdata.append('apellido',this.apellido)
            formdata.append('tipo_identificacion',this.tipo_identificacion)
            formdata.append('numero_identificacion',dato)
            formdata.append('contraseña',this.contraseña)
            formdata.append('tipo_persona',this.tipo_persona)
            formdata.append('email',this.email)
          
            fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorDocente.php',{
               method:'POST',
               body:formdata,
              
           
           }).then(res=>res.json())
           .then(data=>{
               console.log(data)
           })
           console.log(dato)
    },
    
    }


})

 