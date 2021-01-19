

console.log('hpta')


const materia=new Vue({
    el:'#materia',
    data:{
        nombremateria:'',
        seleccion:'',
        correo:'',
        nombredocente:'',
        emaildocente:'',
      //  ceduladocente:'',
        seleccionado:'',
        materias:[],
        materiaid:'',
        seleccionarmateria:'',
        profesorid:'',
        materiaid:'',
        Docentemateria:[]

      
    
    },
mounted(){
this.ListaMaterias();
this.ListarDocentesMaterias();
},
    methods:{
     IngresarMateria:function(e){
        const formdata=new FormData();
        formdata.append('nombremateria',this.nombremateria)
        fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorMateria.php',{
            method:'POST',
            body:formdata,
           
        
        }).then(res=>res.json())
        .then(data=>{
            console.log(data)
             
        })
        e.preventDefault();
     },
    Buscar(){
        console.log('hola')
        const formdata=new FormData();
        formdata.append('seleccion',this.seleccion)
        formdata.append('seleccionado',this.seleccionado)
        fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorDocenteMateria.php',{
            method:'POST',
            body:formdata,
           
        
        }).then(res=>res.json())
        .then(data=>{
            console.log(data)
            this.nombredocente=data.nombre
            this.emaildocente=data.email
            this.profesorid=data.id
            

        })
         
    },
ListaMaterias(){
    const formdata=new FormData();
    formdata.append('nombremateria',this.nombremateria)
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorListarMateria.php',{
        method:'POST',
        body:formdata,
       
    
    }).then(res=>res.json())
    .then(data=>{
        console.log(data)
        this.materias=data
    })
    
},


ListarDocentesMaterias(){
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorMostrarMateriasDocente.php',{
        
        //body:formdata,
       
    
    }).then(res=>res.json()


)
    .then(data=>{
        console.log(data)
     
   this.Docentemateria=data
    })
},


AsignarMateriaDocente(e){
    const formdata=new FormData();
    formdata.append('profesorid',this.profesorid)
    formdata.append('materiaid',this.seleccionarmateria)
     
    fetch(' http://localhost/Colegio-Mercedes/Controlador/ControladorAsignarMateria.php',{
        method:'POST',
        body:formdata,
       
    
    }).then(res=>res.json())
    .then(data=>{
        console.log(data)
        
    })
    e.preventDefault();
}
    },

     

}) 