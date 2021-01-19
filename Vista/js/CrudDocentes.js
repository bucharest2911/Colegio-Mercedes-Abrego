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
        nombremateria:'',
        idmateria:'',
        nombrerado:'',
        idgrado:'',
        materias:[],
        materiaseleccion:0,
        docentesmaterias:[],
        numero:'',
        docenteseleccion:'',
        grados:[],
        gradoseleccion:'',
        profesorgradomateria:[],
        cedula:''

    },

    mounted(){
console.log('hola')
this.MostrarDocente()
this.ListarMaterias()
this.ListarSalon()
this.Listargradoprofesor()
//this.MostrarDocente()
 //this.ListarDocentesMaterias()

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

        ListarDocentesMaterias(){
            const formdata=new FormData();
            console.log(this.materiaseleccion)
 
            formdata.append('materiaseleccion',this.materiaseleccion)
           // for (var value of formdata.values()) {
             //   console.log(value); 
             //}
            fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorAsignarMateriaProfesor.php  ',{
                method:'POST',
            body:formdata,
               
            
            }).then(res=>res.json()
        
        
        ) .then(data=>{
             console.log(data)
            this.docentesmaterias=data
           //this.docentes=data
            })
        },

        ListarMaterias(){
            fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorListarMateria.php',{
        
                //body:formdata,
               
            
            }).then(res=>res.json()
        
        
        )
            .then(data=>{
                console.log(data)
             this.materias=data
           //this.docentes=data
            })
        },
        MateriasDocentes(){
            fetch('  ',{
        
                //body:formdata,
               
            
            }).then(res=>res.json()
        
        
        )
            .then(data=>{
                console.log(data)
             this.materias=data
           //this.docentes=data
            })
        },

Listargradoprofesor(){
    fetch('  http://localhost/Colegio-Mercedes/Controlador/ControladorListargradoprofesor.php',{
       
        
        
        }).then(res=>res.json())
        .then(data=>{
            console.log(data)
            this.profesorgradomateria=data
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
       body:formdata
    
    }).then(res=>res.json())
    .then(data=>{
        console.log(data)
    })

 
    e.preventDefault();
},
ListarSalon(){
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorListarSalon.php  ',{
        method:'POST',
     
       
    
    }).then(res=>res.json()


) .then(data=>{
     console.log(data)
    this.grados=data
   //this.docentes=data
    })
},

ProfesorMateriaGrupo(e){
const formdata=new FormData()
//formdata.append('materiaseleccion',this.materiaseleccion)
formdata.append('docenteseleccion',this.docenteseleccion)
formdata.append('gradoseleccion',this.gradoseleccion)

fetch('  http://localhost/Colegio-Mercedes/Controlador/ControladorGuardarprofesormateriagrupo.php ',{
        method:'POST',
       body:formdata
       
    
    }).then(res=>res.json()


) .then(data=>{
     console.log(data)
  //  this.grados=data
   //this.docentes=data
    })
    e.preventDefault()
},



Limpiar(){

},


RegistrarProfesor(e){
    const formdata=new FormData();

    console.log(this.cedula)
    formdata.append('cedula',this.cedula)
    formdata.append('contraseña',this.contraseña)
    fetch('  http://localhost/Colegio-Mercedes/Controlador/ControladoriniciarDocente.php',{
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
  e.preventDefault()
   })
},
 
ObtenerDocente(dato){
    const formdata=new FormData();
    formdata.append('ceduladocente',dato)
    fetch('  http://localhost/Colegio-Mercedes/Controlador/ControladorEliminarDocente.php ',{
        method:'POST',
       body:formdata
       
    
    }).then(res=>res.json()


) .then(data=>{
     console.log(data)
  //  this.grados=data
   //this.docentes=data
    })
}
    },
    
})