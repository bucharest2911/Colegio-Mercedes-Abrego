const x=new  Vue({
    el:'#Docentes',
    data:{
      
        nombre:'',
        apellido:'',
        tipo_identificacion:'',
        n_identificacion:'',
        contraseña:'',
        tipo_persona:'3',
        email:'',
        docentes:[] ,
    },

    mounted(){
console.log('hola')
this.MostrarDocente()

    },
    methods:{
        MostrarDocente:function(){
            fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorListarDocente.php',{
        
                //body:formdata,
               
            
            }).then(res=>res.json()
        
        
        )
            .then(data=>{
                console.log(data)
             
           this.docentes=data
            })
        },


Registrar(e){
    const formdata=new FormData();
    formdata.append('nombre',this.nombre)
    formdata.append('apellido',this.apellido)
    formdata.append('tipo_identificacion',this.tipo_identificacion)
    formdata.append('numero_identificacion',this.n_identificacion)
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

    this.nombre='',
this.apellido='',
this.tipo_identificacion='',
this.n_identificacion='',
this.contraseña='',
this.tipo_persona=''
    e.preventDefault();
}
    },
    
})